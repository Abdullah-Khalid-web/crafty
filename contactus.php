<?php include 'header.php' ?>


<style>
        /* contact form */

        .Contact {
      display: flex;
      align-items: center;
      justify-content: center;
      width: 100%;

    }

    .contact-form {
      align-items: center;
      justify-content: center;
      max-width: 1000px;
      margin: 20px 20px;
      margin: 20px auto;
      padding: 20px;
      background-color: #ff5405de;
      border: 2px solid rgb(255, 5, 5);
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
      flex: 1;
      /* This makes the input fields take up equal width */
      padding: 10px;
      margin: 5px;
      display: flex;
      margin: 20px 0;
      text-align: left;
      min-width: 100px;
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
      border: 2px solid rgb(255, 84, 5);
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
      border: 1px solid rgb(61, 106, 255);
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


</style>

<main>

    <Section id="Contact">

        <div class="contact-form">
            <h2><span class="orange">Contact Us</span></h2>
            <form action="" method="">
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
                    <input type="submit" value="Submit">
                </div>
            </form>
        </div>
    </Section>
</main>


<?php include 'footer.php' ?>