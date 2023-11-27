<?php

$cookie_name = "eduPlanner_logged_user";
$user_array;

if (isset($_COOKIE[$cookie_name])) {
    $serializedData = $_COOKIE[$cookie_name];
    $user_array = unserialize($serializedData);

    if ($user_array['clearance'] == (0) | $user_array['clearance'] == (1) | $user_array['clearance'] == (2)) {

        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="utf-8">
            <link rel="stylesheet" href="">
            <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
            <script>
                $(document).ready(function () {
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
                    updateTotalCredits();
                    $('#course').change(function () {
                        var selectedCourse = $(this).val();
                        if (selectedCourse !== '') {
                            populateClasses(selectedCourse);    
                        }
                    });
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
                    $('#searchButton').click(function () {
                        var selectedClass = $('#class').val();
                        if (selectedClass !== '') {
                            $.ajax({
                                type: 'POST',
                                url: 'search_classes.php',
                                data: {class: selectedClass},
                                dataType: 'json',
                                success: function (response) {
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
                            $('.addClassButton').click(function () {
                                var classData = JSON.parse(decodeURIComponent($(this).data('class')));
                                var selectedCRN = classData[0]['CRN'];
                                $.ajax({
                                    type: 'POST',
                                    url: 'update_classes.php',
                                    data: {crn: selectedCRN},
                                    dataType: 'json',
                                    success: function (updateResponse) {
                                        if (updateResponse.success) {
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
                                        console.log(xhr.responseText); 
                                    }
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
        <div class="input-box">
            <span class="user-input" style="display: inline; float: none;">Course</span>
            <select id="course" name="course" class="courses">
                <option value="" selected>Select a subject</option>
                <option value="COU">COU - Counselor Education</option>
                <option value="CPS">CPS - Computer Science</option>
            </select>
        </div>

        <div class="input-box">
            <span class="user-input" style="display: inline; float: none;">Class</span>
            <select id="class" name="class">
                <option value="" selected>Select a class</option>
            </select>
        </div>
        <button id="searchButton">Search</button>
        <div id="searchResults"></div>
        <div id="credits"></div>
        <div id="yourClasses"></div>
        <h1>Fix handler if classes column is blank </h1>
        </body>
        </html>
        <?php
    }
} else {
    header("Location: ../login.php");
    exit();
}
?>




