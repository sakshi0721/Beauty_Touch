
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <!-- font awesome link-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.3.0/css/all.min.css"
     integrity="sha512-SzlrxWUlpfuzQ+pcUCosxcglQRNAq/DZjVsC0lE40xsADsfeQoEypE+enwcOiGjk/bSuGGKHEyjSoQ1zVisanQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- bootstrap css link-->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" 
    integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
    <style>
      *{
        margin: 0;
        padding: 0;
        box-sizing: border-box;
        font-family: 'poppins',sans-serif;
      }
      .contact{
        position: relative;
        min-height: 100vh;
        padding: 50px 100px;
        display:flex;
        justify-content: center;
        align-items: center;
        flex-direction: column;
        background: url(photos/contactbg1.png);
        background-size: cover;
      }
      .contact .content{
        max-width: 800px;
        text-align: center;
      }
      .contact .content h2{
        font-size: 36px;
        font-weight: 500;
        color:#fff;
      }
      .contact .content p{
        font-weight: 300;
        color:#fff;
      }
      .container{
        width: 100%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 30px;
      }
      .container .contactInfo{
        width: 50%;
        display: flex;
        flex-direction: column;
      }
      .container .contactInfo .box{
        position: relative;
        padding: 20px 0;
        display:flex;
      }
      .container .contactInfo .box .icon{
        min-width: 60px;
        height: 60px;
        background:#fff;
        display: flex;
        align-items:center;
        justify-content: center;
        border-radius: 50%;
        font-size: 25px;
      }
      .container .contactInfo .box .text{
        display: flex;
        margin-left: 20px;
        font-size: 16px;
        color:#fff;
        flex-direction: column;
        font-weight: 300;
      }
      .container .contactInfo .box .text h3{
        font-weight: 500;
        color: #00bcd4;
      }

    </style>
</head>

<body>
  <section class="contact">
    <div class="content mt-5">
      <h2>ContactUs</h2>
      <p>If you have a question or a comment, please call us on +91 6284981685 (9.00am to 6.00pm. Monday to Saturday.) or email us at 216910sakshigoyal@gmail.com or use the form below to contact us.</p>
    </div>
    <div class="container">
      <div class="contactInfo m-auto">
        <div class="box">
          <div class="icon"><i class="fa fa-map-marker" aria-hidden="true"></i></div>
          <div class="text">
            <h3>Address</h3>
            <p>Trunk Bazar, Near Shri Haridev Mandir<br>141008,Ludhiana, Punjab, India </p>
          </div>
        </div>
        <div class="box">
          <div class="icon"><i class="fa fa-phone" aria-hidden="true"></i></div>
          <div class="text">
            <h3>Phone</h3>
            <p>+91-6284981685</p>
          </div>
        </div>
        <div class="box">
          <div class="icon"><i class="fa fa-envelope" aria-hidden="true"></i></div>
          <div class="text">
            <h3>Email</h3>
            <p>216910sakshigoyal@gmail.com</p>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>