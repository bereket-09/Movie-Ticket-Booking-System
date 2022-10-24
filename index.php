<?php
session_start();



if (isset($_SESSION['username'])) {
    header("Location: /movie/movie.php");
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta http-equiv="X-UA-Compatible" content="ie=edge" />
    <title>ONLINE MOVIE BOOKING || HOME </title>
    <!-- styles css -->
    <link rel="stylesheet" href="./style.css" />
</head>

<body>
    <!-- header  -->
    <header id="home">
        <!-- navbar -->
        <nav class="navbar">
            <div class="nav-center">
                <!-- nav header -->
                <div class="nav-header">
                    <!-- </button> -->
                </div>
                <!-- end of nav header -->
                <!-- nav links -->
                <div class="nav-links" id="nav-links">
                    <!-- single link -->
                    <a href="#home" class="scroll-link nav-link">
                        home
                    </a>
                    <!-- end of single link -->
                    <!-- single link -->
                    <a href="#about" class=" scroll-link nav-link">
                        about
                    </a>
                    <!-- end of single link -->
                    <!-- single link -->
                    <a href="#services" class="nav-link scroll-link">
                        services
                    </a>
                    <!-- end of single link -->
                    <!-- single link -->
                    <a href="#featured" class="nav-link scroll-link">
                        featured
                    </a>
                    <!-- end of single link -->
                    <!-- single link -->
                    <a href="/movie/login/index.php" class="login">
                        Login
                    </a>
                    <a href="/movie/login/register.php" class="reg">
                        Register
                    </a>

                </div>
            </div>
        </nav>
        <!-- hero component -->
        <div class="hero">
            <div class="hero-banner">
                <h1 class="hero-title">ONLINE MOVIE TICKET BOOKING SYSTEM</h1>
                <p class="hero-text">
                    A central place for booking cinema ticket anywhere at any time .
                </p>
                <a href="#featured" class="btn-white">explore movies</a>
            </div>
        </div>
    </header>
    <!-- end of header  -->
    <!-- about section -->
    <section class="section about" id="about">
        <!-- title  -->
        <div class="title-wrapper">
            <h2 class="title">about <span class="subtitle">us</span></h2>
        </div>
        <!-- end of title  -->
        <!-- about-center -->
        <div class="section-center about-center">
            <!-- about img wrapper-->
            <div class="about-img">
                <img src="./assets/images/main.gif" class="about-photo" alt="awesome beach" style="height: 450px;" />
            </div>
            <!-- about info -->
            <article class="about-info">
                <h3>explore the difference</h3>
                <p>
                    Our System allows anyone from any part of the country to search for the nearest cinema to watch his or her favourite movie.
                </p>
                <p>
                    Daily updated contenet new movies and new Cinemal locations are being added on a dialy basics and our teams are doing 24/7 to satisfuly our customers needs.
                </p>
                <a href="#services" class="btn-primary">read more</a>
            </article>
        </div>
    </section>
    <!-- end of about section -->
    <!-- services -->
    <section class="section services" id="services">
        <!-- title  -->
        <div class="title-wrapper">
            <h2 class="title">our <span class="subtitle">services</span></h2>
        </div>
        <!-- end of title  -->
        <div class="section-center services-center">
            <!-- single service -->
            <article class="service">
                <span class="service-icon"><i class="fas fa-wallet fa-fw"></i></span>
                <div class="service-info">
                    <h4 class="service-title">saving money</h4>
                    <p class="service-text">
                        Save the money you will spend for transport and other expenses just by booking tickets online.
                    </p>
                </div>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service">
                <span class="service-icon"><i class="fas fa-tree fa-fw"></i></span>
                <div class="service-info">
                    <h4 class="service-title">Various Options</h4>
                    <p class="service-text">
                        We have an organized structure of storing and delivering information and even if you cant find the right cinema or even the right movies we have also other various options you can explore.
                    </p>
                </div>
            </article>
            <!-- end of single service -->
            <!-- single service -->
            <article class="service">
                <span class="service-icon"><i class="fas fa-socks fa-fw"></i></span>
                <div class="service-info">
                    <h4 class="service-title">amazing comfort</h4>
                    <p class="service-text">
                        Easy to understand and simple website visual structures that can be understanded by anyone .
                    </p>
                </div>
            </article>
            <!-- end of single service -->
        </div>
    </section>
    <!-- end of services -->
    <!-- featured movies -->
    <section class="section featured-movies" id="featured">
        <!-- title  -->
        <div class="title-wrapper">
            <h2 class="title">featured <span class="subtitle">movies</span></h2>
        </div>
        <!-- end of title  -->
        <!-- featured-center -->
        <div class="section-center featured-center ">
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./assets/covers/Candyman_(2021_film).png" class="movie-img" alt="" style="height: 250px; " />
                    <p class="movie-date">august 14th, 2021</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">Candy MAN</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> USA
                        </p>
                        <div class="movie-details">
                            <p>Action</p>
                            <p>ALL CINEMAS</p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end of single movie -->
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./assets/covers/freeguy.jpg" style="height: 250px; " class="movie-img" alt="" />
                    <p class="movie-date">october 1th, 2020</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">FREE GUY</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> USA
                        </p>
                        <div class="movie-details">
                            <p>ACtion COMEDY</p>
                            <p> ALL CINEMAS </p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end of single movie -->
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./assets/covers/pow_pattrol the movie.jpg" style="height: 250px; " class="movie-img" alt="" />
                    <p class="movie-date">June 26th, 2021</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">PAW Patrol: The Movie</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> UK
                        </p>
                        <div class="movie-details">
                            <p>Animation</p>
                            <p>ALL CINEMAS</p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./Assets/covers/keflo_muach.png" style="height: 250px; " class="movie-img" alt="" />
                    <p class="movie-date">september 26th, 2021</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">ከፍሎ ሟች</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> ETHIOPIA
                        </p>
                        <div class="movie-details">
                            <p>ROMANCE COMEDY</p>
                            <p>ALL CINEMAS</p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end of single movie -->
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./assets/covers/dont breath.jpg" style="height: 250px; " class="movie-img" alt="" />
                    <p class="movie-date">october 1th, 2021</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">Dont' Breath 2</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> USA
                        </p>
                        <div class="movie-details">
                            <p>Horror</p>
                            <p>ALL CINEMAS</p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end of single movie -->
            <!-- end of single movie -->
            <!-- single movie -->
            <article class="movie-card">
                <div class="movie-img-container">
                    <img src="./assets/covers/jungle cruze.jpg" style="height: 250px; " class="movie-img" alt="" />
                    <p class="movie-date">december 5th, 2021</p>
                </div>
                <!-- movie footer -->
                <div class="movie-footer">
                    <h4 class="movie-title">Jungle Cruze</h4>
                    <!-- movie info -->
                    <div class="movie-info">
                        <p class="movie-country">
                            <span><i class="fas fa-map"></i></span> kenya
                        </p>
                        <div class="movie-details">
                            <p>Adventure</p>
                            <p>All Cinemas</p>
                        </div>
                    </div>
                </div>
            </article>
            <!-- end of single movie -->
        </div>
        <!-- end of movies center -->
        <div class="movie-link">
            <a href="movie.php" class="btn-primary">All Movies</a>
        </div>
    </section>
    <!-- end of featured movies -->
    <!-- contact -->
    <section class="section deals" id="deals">
        <!-- title  -->
        <div class="title-wrapper">
            <h2 class="title">Register For News Letter<span class="subtitle "></span></h2>
        </div>
        <!-- end of title  -->
        <form>
            <div class="input-group">
                <input type="email" class="form-control" placeholder="your email" />
                <button type="submit" class="btn-submit">submit</button>
            </div>
        </form>
    </section>
    <!-- end of contact -->
    <!-- footer -->
    <footer class="section footer">
        <!-- footer links -->
        <div class="footer-links">
            <a href="#home" class="footer-link scroll-link">home</a>
            <a href="#about" class="footer-link scroll-link">about</a>
            <a href="#services" class="footer-link scroll-link">services</a>
            <a href="#featured" class="footer-link scroll-link">featured</a>


        </div>
        <!-- footer icons -->
        <p class="copyright">
            copyright &copy; ONLINE MOVIE TICKET BOOKING SYSTEM
            <span id="date"></span>. all rights reserved <br>By All Group Members 2013 E.C
        </p>
    </footer>
    <!-- js -->
    <script src="./js/app.js"></script>
</body>

</html>