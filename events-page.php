<?php 
       session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/event-styles.css">
    <link rel="stylesheet" href="./css/styles.css">

    <title>Student Mitra Events</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
      
</head>
<body>
      <!-- top header -->
        <?php 
        include "header.php";
        ?>


    <!-- EVENTS STARTER -->
        
    <div class="banner">
        <div class="banner-text">
            <h4>StudentMitra Events</h4>
            <span><i>Unlock the doors of imagination</i><span>
        </div>
    </div>
    
    <h1 class="event-title"style="text-align: center;">Latest Events</h1>

    <!-- EVENTS LISTS -->
    <section id="events"> 
        <div class="events-list">
                <!-- EVENT -->
                <div class="single-event">
                    <img src="./img/imgEvents/event1.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>CYGNUS</h3>
                        <hr>
                        <p>Cygnus is a cultural event that focuses on the extra curricular activities of the students and to give a platform to show their hidden talents. Students get to enjoy the performances and games in the event with full of joy and happiness.</p>
                        <button onclick="display(document.getElementById('event-1'))">Read more</button>
                    </div>
                </div>
                <!-- EVENT -->
                <div class="single-event" >
                    <img src="./img/imgEvents/event2.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>STREE</h3>
                        <hr>
                        <p>An event focussing on the key solutions to stop the brutal acts and physical abuses against women in the society and to focus on women empowerment.The event that calls for the students to take a step in women protection.</p>
                        <button onclick="display(document.getElementById('event-2'))">Read more</button>
                    </div>
                </div>
                <!-- EVENT -->
                <div class="single-event">
                    <img src="./img/imgEvents/event3.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>ZEST</h3>
                        <hr>
                        <p>A welcome fest to freshers of RGUKT. Freshers keep homesick aside and get a lot of enjoyment.</p>
                        <button onclick="display(document.getElementById('event-3'))">Read more</button>
                    </div>
                </div>
                <!-- EVENT -->
                <div class="single-event">
                    <img src="./img/imgEvents/event4.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>ENTHUSIA</h3>
                        <hr>
                        <p> A cultural fest conducted to get rid of all the stress and pressure of academics on students. No limit to entertainment here.</p>
                        <button onclick="display(document.getElementById('event-4'))">Read more</button>
                    </div>
                </div>
                <!-- EVENT -->
                <div class="single-event">
                    <img src="./img/imgEvents/event5.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>SKYPE SESSIONS</h3>
                        <hr>
                        <p>Alumni students who got settled in various places across the globe giving suggestions and clarifying students doubts regarding higher education, jobs, competitive exams etc..A good motivation will be given to students.</p>
                        <button onclick="display(document.getElementById('event-5'))">Read more</button>
                    </div>
                </div>
                <!-- EVENT -->
                <div class="single-event">
                    <img src="./img/imgEvents/event6.jpeg" alt="image">
                    <div class="overlay"></div>
                    <div class="event-desc">
                        <h3>CRT SESSIONS</h3>
                        <hr>
                        <p>To the students having a big confusion on how to prepare for competitive exams , campus placements ;lectures will be given by the faculty on the topics related to altitude, corporates morals, interview and communication skills.</p>
                        <button onclick="display(document.getElementById('event-6'))">Read more</button>
                    </div>
                </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Events Full Imformation in Popup -->
    <section>
        <!-- EVENT-1 -->
        <div id="event-1" class="pop-up">
            <div class="window-hamberger">
                <img class="close" src="./img/imgEvents/close.png" alt="X">
            </div>
            <div class="window">
                <br><br><br><br>
                <h1>Cygnus  -Biggest cultural fest of RGUKT</h1>
                <!-- Poster visibility -->
                <div class="poster"><img src="./img/imgEvents/event1.jpeg" alt="img" style="height:90vh; width:75%; padding:20px; object-fit:fill;"></div>
                <br>
                <p>Cygnus is a cultural event that focuses on the extra curricular activities of the students and to give a platform to show their hidden talents. Students get to enjoy the performances and games in the event with full of joy and happiness</p>
                <br><br><br><br><br><br>
            </div>
        </div>
        <!-- EVENT-2 -->
        <div id="event-2" class="pop-up">
            <div class="window-hamberger">
                <img class="close" src="./img/imgEvents/close.png" alt="X">
            </div>
            <div class="window">
            <br><br><br><br>
                <h1>STREE  -Be a part of the change</h1>
                <!-- Poster visibility -->
                <div class="poster"><img src="./img/imgEvents/event2.jpeg" alt="img" style="height:90vh; width:75%; padding:20px; object-fit:fill;"></div>
                <br>
                <p>An event focussing on the key solutions to stop the brutal acts and physical abuses against women in the society and to focus on women empowerment. The event that calls for the students to take a step in women protection.</p>
                <br><br><br><br><br><br> 
            </div>
        </div>
         
    </section>



         <!-- footer -->
        <?php  
            include "footer.php";
        ?>
    <script src="./js/script.js"></script>
    
    <script>
          $(document).ready(function(){
                $(".pop-up").hide();
                $(".close").click(function(){
                    $(".pop-up").hide();
                    $('.stop').trigger('pause');
                });
            });

            function display(event){
                $(event).show();
            }
    </script>

<!-- POPUPS Handling -->
<!-- Poster visibility -->
<!-- <div class="poster"><img src="./img/event1.jpeg" alt="img" style="height:90vh; width:75%; padding:20px; object-fit:fill;"></div> -->

<!-- Video visibility -->
<!-- <div class="row">
    <div class="window-left">
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Distinctio neque illo, at perferendis hic nobis? Illo tempore, aut sit eum voluptates ipsum blanditiis omnis id totam fuga similique in numquam!</p>
        <br>
        <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Veniam reiciendis in nam itaque veritatis voluptas aspernatur similique nobis libero totam minus quod accusamus neque, a voluptate eaque placeat, hic quae.</p>
    </div>
    <div class="window-right">
        <video class="stop" height="400" width="600" controls>
            <source src="./img/imgEvents/tech.mp4" type="video/mp4">
        </video>  
    </div>                 
    </div>
    <br>

    <p></p>
</div> -->

</body>
</html>