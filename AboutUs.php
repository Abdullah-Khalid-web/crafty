<?php include 'header.php' ?>
<style>
    /* About Us Page */


    body {
        font-family: Arial, sans-serif;
        /* overflow-x: hidden; */
    }

    h2 {
        color: var(--primary-color);
    }

    h3 {
        color: var(--secondary-color);
    }

    ul li {
        margin-bottom: 10px;
    }

    ul li i {
        color: var(--primary-color);
    }

    .about_img img {
        max-width: 100%;
        height: auto;
        border: 2px solid var(--primary-color);
    }





    /* contact form */

    .contact-form {
        align-items: center;
        justify-content: center;
        max-width: 1000px;
        margin: 20px auto;
        padding: 20px;
        background-color: var(--primary-color);
        border: 6px solid var(--secondary-color);
        border-radius: 12px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        text-align: center;
    }

    .contact-form .orange {
        color: #ffff;
    }

    .contact-form form .ff {
        display: flex;
        flex-wrap: wrap;
        margin: auto;
        align-items: center;
        justify-content: center;


    }

    .ff input {
        flex-wrap: wrap;
        box-sizing: border-box;
    }

    .form-group {
        display: flex;
        flex: 1;
        padding: 10px;
        flex-wrap: wrap;
        margin: 0px 0;
        text-align: left;
        min-width: 220px;
    }

    label {
        display: block;
        font-weight: bold;
        margin-bottom: 6px;
        color: #fff;
    }

    input[type="text"],
    input[type="email"],
    textarea {
        width: 100%;
        padding: 12px;
        border: 2px solid var(--secondary-color);
        border-radius: 6px;
        background-color: #fff;
        color: #0d0d0d;
        transition: border-color 0.3s, background-color 0.3s;
    }

    input[type="text"]:focus,
    input[type="email"]:focus,
    textarea:focus {
        border-color: rgb(255, 84, 5);
        background-color: #fff;
    }




    input[type="submit"] {
        position: relative;
        padding: 10px 20px;
        border-radius: 7px;
        border: 1px solid var(--secondary-color);
        font-size: 14px;
        text-transform: uppercase;
        font-weight: 600;
        letter-spacing: 2px;
        background: transparent;
        color: #ff5733;
        background-color: white;
        overflow: hidden;
        box-shadow: 0 0 0 0 transparent;
        -webkit-transition: all 0.2s ease-in;
        -moz-transition: all 0.2s ease-in;
        transition: all 0.2s ease-in;
        color: var(--primary-color);
    }

    input[type="submit"]:hover {
        background: rgb(53, 51, 51);
        box-shadow: 0 0 30px 5px rgb(43, 43, 38);
        -webkit-transition: all 0.2s ease-out;
        -moz-transition: all 0.2s ease-out;
        transition: all 0.2s ease-out;
        color: white;
    }

    input[type="submit"]:hover::before {
        -webkit-animation: sh02 0.5s 0s linear;
        -moz-animation: sh02 0.5s 0s linear;
        animation: sh02 0.5s 0s linear;
    }

    input[type="submit"]::before {
        content: '';
        display: block;
        width: 0px;
        height: 86%;
        position: absolute;
        top: 7%;
        left: 0%;
        opacity: 0;
        background: #fff;
        box-shadow: 0 0 50px 30px #fff;
        -webkit-transform: skewX(-20deg);
        -moz-transform: skewX(-20deg);
        -ms-transform: skewX(-20deg);
        -o-transform: skewX(-20deg);
        transform: skewX(-20deg);
    }

    @keyframes sh02 {
        from {
            opacity: 0;
            left: 0%;
        }

        50% {
            opacity: 1;
        }

        to {
            opacity: 0;
            left: 100%;
        }
    }

    input[type="submit"]:active {
        box-shadow: 0 0 0 0 transparent;
        -webkit-transition: box-shadow 0.2s ease-in;
        -moz-transition: box-shadow 0.2s ease-in;
        transition: box-shadow 0.2s ease-in;
    }



    #contact {
    background-color: var(--secondary-color);
    color: #fff;
    padding: 20px 0;
    border-radius: 8px;
}

#contact h3 {
    color: #fff;
}

#contact h4 {
    color: #fff;
}

#contact p {
    color: #ddd;
}

#contact a {
    color: #fff;
    text-decoration: none;
}

#contact a:hover {
    text-decoration: underline;
}

.contact-box .btn-outline-dark {
    border-color: var(--primary-color);
    color: var(--primary-color);
}

.contact-box .btn-outline-dark:hover {
    background-color: #fff;
    color: var(--secondary-color);
}



</style>

<main>


    <section id="About" class="container my-5">
        <div class="row">
            <div class="col-lg-6">
                <h2 class="display-4">About Pakpet</h2>
                <p class="lead">
                    Welcome to Pakpet, your one-stop destination for all things pets in Pakistan. Whether you're looking
                    to bring a new furry friend into your home, seeking advice on pet care and nutrition, or searching
                    for the perfect accessories and supplies, we've got you covered.
                </p>
                <p>
                    At Pakpet, we're passionate about connecting pet lovers with everything they need to provide happy,
                    healthy lives for their beloved companions. Our mission is to create a community of pet enthusiasts
                    and provide them with top-notch resources and products that cater to the diverse needs of their
                    pets.
                </p>
                <h3 class="mt-4">Our Values</h3>
                <ul class="list-unstyled">
                    <li><i class="fas fa-paw"></i> Commitment to Quality</li>
                    <li><i class="fas fa-heart"></i> Passion for Pets</li>
                    <li><i class="fas fa-thumbs-up"></i> Exceptional Customer Service</li>
                </ul>
            </div>
            <div class="about_img col-lg-6">
                <img src="images/cat-8198720_640.webp" alt="About Us" class="img-fluid rounded">
            </div>
        </div>
    </section>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/js/all.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>


    <Section id="Contact">

        <h1 class="text-center text-pri">Contact Us</h1>

    <div class="row m-0">
        <div class="col-md-4 text-center ">
            <h4>Email</h4>
            <p><a class="text-pri" href="mailto:info@pakpet.com">info@pakpet.com</a></p>
        </div>
        <div class="col-md-4 text-center">
            <h4>Phone</h4>
            <p>+92 300 1234567</p>
        </div>
        <div class=" contact-box col-md-4 text-center">
            <h4>Follow Us</h4>
            <a href="https://instagram.com/pakpet" target="_blank" class="btn btn-outline-dark btn-sm m-1 bg-pri text-light">
                <i class="fab fa-instagram "></i> Instagram
            </a>
            <a href="https://facebook.com/pakpet" target="_blank" class="btn btn-outline-dark btn-sm m-1 bg-pri text-light hover-text-pri">
                <i class="fab fa-facebook-f"></i> Facebook
            </a>
        </div>
    </div>

        <?php   
        if(isset($_POST['contact_submit'])){
            $name = $_POST['name'];
            $email = $_POST['email'];
            $message = $_POST['message'];

            $sql = "INSERT into `contact` (name, email, message)
            values ('$name','$email','$message')";
            $result = mysqli_query($con, $sql);
            if($result){
                echo "<script>alert('Your message has been sent successfully')</script>";
            }else{
                echo "<script>alert('Your message not sent ')</script>";
                }
        }
        ?> 

        <div class="contact-form">
            <form action="" method="post">
                <h2 class="text-light">Feedback(Problem, Suggestion )</h2>
                <div class="ff">
                    <div class="form-group ">
                        <label for="name">Name:</label>
                        <input type="text" id="name" name="name" required>
                    </div>
                    <div class="form-group ">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" required>
                    </div>
                </div>
                <div class="form-group">
                    <label for="message">Message:</label>
                    <textarea id="message" name="message" rows="4" required></textarea>
                </div>
                <div class="form-group ">
                    <input type="submit" name="contact_submit" value="Submit">
                </div>
            </form>
        </div>
    </Section>
</main>

<?php include 'footer.php' ?>