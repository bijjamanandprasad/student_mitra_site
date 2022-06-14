<!-- 

Created between June2021 - July2021
* JAGADEESH KOPPULA (N170142)
* ANAND PRASAD B (N170049)
* UDAY KIRAN P (N170019) 

-->
<?php

session_start();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Mitra | About</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="./css/styles.css">
</head>
<body>
    <!-- top header -->
    <?php
        include "header.php";
    ?>

    <section class="about about-main">
        <div class="container">
            <h1 class="heading">ABOUT STUDENT MITRA</h1>
            <div class="row">
                <div class="col-left">
                    <p>
                    Student Mitra is a student welfare organization in RGUKT Nuzvid
                    founded in February 2016 to give students a better interface showcase
                    their inner talents by using our website which we have in our university
                    based intranet facility.

                    Apart from the talent exposure website, student Mitra also focuses on offline interactive sessions with successful personalities across different fields with the main motto of "motivating students towards their goal".
                    Creating awareness, educating about the environment, inculcating
                    values, building ethics, and students' all-round development are the key
                    functions of our organization.
                    </p>
                </div>
                <br>
                <div class="col-right">
                    <div class="img">
                        <img src="./img/dummy4.jpg" alt="">
                    </div>
                </div>
            </div>
            <br>
                <p> 
                Our main motto is to conduct student friendly activities and sessions 
                which enhances the student knowledge and  extrapolates the hidden student talents. Interactive sessions, Workshops, skype Interactive 
                sessions, cultural events like Enthusia, Sitara,  Saathiya etc. 
                </p>
            <br>
            <div class="row">
                <div class="col-right">
                    <div class="img">
                        <img src="./img/dummy2.jpg" alt="">
                    </div>
                </div>
                <br>
                <div class="col-left">
                    <p>“Studentmitra” is a student friendly website dedicated for the students to entrap their hidden talents through knowledge sharing. We designed this website as a startup to provide a comprehensive overview of our mission. This website is an amalgamation of various portals such as “Introduce a HERO”, Entrepreneurship, Go compete&prove, Out of the box, Literature, Shopping buzz etc. These portals are specifically designed in accordance with the needs of student.</p>
                </div>
            </div>
            <br>
            <p>Thus enhancing their technical and creative abilities. This website provide access to information ,services and resources to help every student get the most out of their enriching university experience .Its uniqueness lies in the fact that it is not only confined to our university but would expand its horizons to collaborate with other colleges and universities in the near future. These tie-ups would result in the exchange of knowledge. Through this platform, the budding technocrats have a wider audience to compete and know where they stand among others. Studentmitra’s  education network helps connects all learners with relative tools needed to reach their full Potential.</p>
            
            <br>
        </div>
    </section>

    <!-- footer -->
    <?php
        include "footer.php";
    ?>


    <script src="./js/script.js"></script>

    <script>

        //slide show
        let slideIndex = 0;
        showSlides();

        function showSlides() {
            var slides = document.getElementsByClassName("slide");
            for (let i = 0; i < slides.length; i++) {
                slides[i].style.display = "none ";
            }
            slideIndex++;
            if (slideIndex > slides.length) {
                slideIndex = 1
            }
            slides[slideIndex - 1].style.display = "block ";
            setTimeout(showSlides, 4000); // Change image every 2 seconds
        }; 

    </script>

</body>
</html>