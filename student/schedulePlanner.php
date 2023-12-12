<?php
//Include database connection @Ramses
include("../includes/connect.php");
//Retrieve all subjects @Ramses
$sqlSubjects = "SELECT * FROM course_subjects";
$resultSubjects = $conn->query($sqlSubjects);
//Check if there are subjects in the database @Ramses
if ($resultSubjects->num_rows > 0) {
   session_start();
   $cookie_name = "eduPlanner_logged_user";
   $user_array;
   //Check if user logged in @Ramses
   if (isset($_COOKIE[$cookie_name])) {
      //Unserialize cookie and save it in array @Ramses
      $serializedData = $_COOKIE[$cookie_name];
      $user_array = unserialize($serializedData);
      //Check if user is a student
      if ($user_array['clearance'] == 2)  {
?>

<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8">
      <title>SUNY NP Student Schedule Planner</title>
      <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
      <script>
            $(document).ready(function () {
               //Ajax request to remove a class @Ramses
               $(document).on('click', '.removeClassButton', function () {
                  var selectedCRN = $(this).data('crn');
                  $.ajax({
                     type: 'POST',
                     url: 'remove_class.php', 
                     data: {crn: selectedCRN},
                     dataType: 'json',
                     success: function (removeResponse) {
                        if (removeResponse.success) {
                           $(this).parent().remove();
                           //Ajax request function call to update total credits and display classes @Ramses
                           $.ajax({
                              type: 'GET',
                              url: 'display_classes.php',
                              success: function (displayResponse) {
                                 $('#yourClasses').html(displayResponse);
                                 //Call function to update total credits @Ramses
                                 updateTotalCredits();
                              },
                              error: function (xhr, status, error) {
                                 console.error("AJAX Error: " + status + " - " + error);
                                 alert('Error displaying classes. See console for details.');
                              }
                        });
                        } 
                        else {
                           alert('Error removing class from the database.');
                        }
                     },
                        error: function (xhr, status, error) {
                        console.error("AJAX Error: " + status + " - " + error);
                        console.log(xhr.responseText);
                        alert('Error removing class. See console for details.');
                        }
                  });
               });
               //Function to populate classes dropdown based on subject dropdown @Ramses
               function populateClasses(selectedCourse) {
                  $.ajax({
                        type: 'POST',
                        url: 'get_classes.php',
                        data: {course: selectedCourse},
                        dataType: 'json',
                        success: function (response) {
                           $('#class').find('option').remove();
                           $('#class').append('<option value="" selected>Select a class</option>');
                           $.each(response, function (index, value) {
                              $('#class').append('<option value="' + value + '">' + value + '</option>');
                           });
                        },
                        error: function (xhr, status, error) {
                           console.error("AJAX Error: " + status + " - " + error);
                           alert('Error fetching classes. See console for details.');
                        }
                  });
               }
               //Function to update total credits in schedule @Ramses
               function updateTotalCredits() {
                  $.ajax({
                     type: 'GET',
                     url: 'count_credits.php',
                     dataType: 'json',
                     success: function (creditsResponse) {
                        if (creditsResponse.success) {
                           $('#credits').html('<h2>You currently have ' + creditsResponse.total_credits + ' credits in your schedule</h2>');
                        } else {
                           alert('Error updating total credits. See console for details.');
                        }
                     },
                     error: function (xhr, status, error) {
                        console.error("AJAX Error: " + status + " - " + error);
                        alert('Error updating total credits. See console for details.');
                     }
                  });
               }
               //On start-up call to render total credits @Ramses
               updateTotalCredits();
               //Event listener for subject selection @Ramses
               $('#course').change(function () {
                  var selectedCourse = $(this).val();
                  if (selectedCourse !== '') {
                     populateClasses(selectedCourse);
                  }
               });
               //Ajax request to display classes in user schedule @Ramses
               $.ajax({
                  type: 'GET',
                  url: 'display_classes.php',
                  success: function (displayResponse) {
                     $('#yourClasses').html(displayResponse);
                  },
                  error: function (xhr, status, error) {
                     console.error("AJAX Error: " + status + " - " + error);
                     alert('Error displaying user classes. See console for details.');
                  }
               });
               //Event listener for search button click @Ramses
               $('#searchButton').click(function () {
                  var selectedClass = $('#class').val();
                  if (selectedClass !== '') {
                     //Ajax request to search for classes @Ramses
                     $.ajax({
                        type: 'POST',
                        url: 'search_classes.php',
                        data: {class: selectedClass},
                        dataType: 'json',
                        success: function (response) {
                           //Organize search results @Ramses
                           $('#searchResults').empty();
                           var organizedResults = {};
                           $.each(response, function (index, row) {
                              var crn = row['CRN'];
                              var title = row['title'];
                              if (!(title in organizedResults)) {
                                 organizedResults[title] = {};
                              }
                              if (!(crn in organizedResults[title])) {
                                 organizedResults[title][crn] = [];
                              }
                                 organizedResults[title][crn].push(row);
                           });
                           //Display organized search results and add a button @Ramses
                           $.each(organizedResults, function (title, crns) {
                                 $.each(crns, function (crn, classes) {
                                    var listHTML = '<span><h2>Search Results</h2><ul>';
                                    listHTML += '<span class="title"> <h3>' + crn + ' - ' + title + '</h3>';
                                    listHTML += '<button class="addClassButton" data-class="' + encodeURIComponent(JSON.stringify(classes)) + '">Add Class</button></span>';
                                    $.each(classes, function (index, cls) {
                                       listHTML += '<li>' + cls['course'] + ' - ' + cls['title'] + ' - ' + cls['days'] + ' - ' + cls['time'] + ' - Available Seats:' + cls['available_seats'] + '</li>';
                                    });
                                    listHTML += '</ul>';
                                    $('#searchResults').append(listHTML);
                                 });
                           });
                           //Event listener for add class button click @Ramses
                           $('.addClassButton').click(function () {
                              var classData = JSON.parse(decodeURIComponent($(this).data('class')));
                              var selectedCRN = classData[0]['CRN'];
                              //Ajax request to update classes @Ramses
                              $.ajax({
                                 type: 'POST',
                                 url: 'update_classes.php',
                                 data: {crn: selectedCRN},
                                 dataType: 'json',
                                 success: function (updateResponse) {
                                    if (updateResponse.success) {
                                       //Ajax request to display classes after adding a new class @Ramses
                                       $.ajax({
                                          type: 'GET',
                                          url: 'display_classes.php',
                                          success: function (displayResponse) {
                                             $('#yourClasses').html(displayResponse);
                                             updateTotalCredits();
                                          },
                                          error: function (xhr, status, error) {
                                             console.error("AJAX Error: " + status + " - " + error);
                                             alert('Error displaying classes. See console for details.');
                                          }
                                       });
                                    } else {
                                       if (updateResponse.message) {
                                          alert(updateResponse.message);
                                       } else {
                                          alert('Error updating classes in the database.');
                                       }
                                    }
                                 },
                                 error: function (xhr, status, error) {
                                       console.error("AJAX Error: " + status + " - " + error);
                                       alert('Error updating classes. See console for details.');
                                       console.log(xhr.responseText);                                     }
                              });
                           });   
                           },
                           error: function (xhr, status, error) {
                              console.error("AJAX Error: " + status + " - " + error);
                              alert('Error searching for classes. See console for details.');
                           }
                        });
                  }
                  
               });
            });
      </script>
      </head>
      <body>
      <div>
      <?php require('./navbar.php'); ?>
      <div>
      <div class="Main-Content">
      <!--Dropdown of subjects  @Ramses-->
      <?php require('../courseDropdown.php'); ?>
         <div class="input-box">
            <!--Dynamic Class Dropdown @Ramses-->
            <span class="user-input" style="display: inline; float: none;">Class</span>
            <select id="class" name="class">
               <option value="" selected>Select a class</option>
            </select>
         </div>
         <!--Search button @Ramses-->
         <button id="searchButton">Search</button>
         <!--Div for search results @Ramses -->
         <div id="searchResults"></div>
         <!--Div for credits count @Ramses -->
         <div id="credits"></div>
         <!--Div to show current classes @Ramses -->
         <div id="yourClasses"></div>
      </div>
      </body>
      <?php require('../loggedFooter.php'); ?>
      </html>
      <?php
  }
}
else{
   //Return to login if user not logged in @Ramses
    header("Location: ../login.php");
    exit();
}
?>
<?php
} else {
   //Convey if there is no data in the subjects table @Ramses
    echo "No data found in the course_subjects table.";
}
//Close database connection @Ramses
$conn->close();
?>




