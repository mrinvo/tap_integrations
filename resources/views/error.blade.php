<html>
    <head>
        <link rel="stylesheet" href="/css/style.css">
        <link href="/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" integrity="sha512-1ycn6IcaQQ40/MKBW2W4Rhis/DbILU74C1vSrLJxCq57o941Ym01SwNsOMqvEBFlcgUa6xLiPY/NS5R+E6ztJQ==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <style>
#notfound {
  position: relative;
  height: 60vh;
}

#notfound .notfound {
  position: absolute;
  left: 50%;
  top: 50%;
  -webkit-transform: translate(-50%, -50%);
      -ms-transform: translate(-50%, -50%);
          transform: translate(-50%, -50%);
}

.notfound {
  max-width: 560px;
  width: 100%;
  padding-left: 160px;
  line-height: 1.1;
}

.notfound .notfound-404 {
  position: absolute;
  left: 0;
  top: 0;
  display: inline-block;
  width: 140px;
  height: 140px;
  background-image: url('/sad.png');
  background-size: cover;
}

.notfound .notfound-404:before {
  content: '';
  position: absolute;
  height: 100%;
  -webkit-transform: scale(2.4);
      -ms-transform: scale(2.4);
          transform: scale(2.4);
  border-radius: 50%;
  background-color: #f2f5f8;
  z-index: -1;
}

.notfound h1 {
  font-family: 'Nunito', sans-serif;
  font-size: 50px;
  font-weight: 700;
  margin-top: 0px;
  margin-bottom: 10px;
  color: #ff0d00;
  text-transform: uppercase;
}

.notfound h2 {
  font-family: 'Nunito', sans-serif;
  font-size: 21px;
  font-weight: 400;
  margin: 0;
  text-transform: uppercase;
  color: #151723;
}

.notfound p {
  font-family: 'Nunito', sans-serif;
  color: #34383b;
  font-weight: 400;
  font-size: 40px;
}

.notfound a {
  font-family: 'Nunito', sans-serif;
  display: inline-block;
  font-weight: 700;
  border-radius: 40px;
  text-decoration: none;
  color: #ff0000;
}
ul li{
    font-size: 20px;
}
.sf-dump-expanded{
    color:orangered;
}


@media only screen and (max-width: 767px) {
  .notfound .notfound-404 {
    width: 110px;
    height: 110px;
  }
  .notfound {
    padding-left: 15px;
    padding-right: 15px;
    padding-top: 110px;
  }
}


            </style>
    </head>
    <body>
        <div id="wrapper">

            <div class="container2">
                <div class="checkout">


                    <div class="payment">
                        <div class="content">
                            <div class="infos error">

                                <div id="notfound">
                                    <div class="notfound">
                                        <div class="notfound-404"></div>
                                        <h1 style="font-size: 30px;">Faild Transaction</h1>


                                            <p>
                                                <ul>

                                                    <li>Gateway code: {{ $response->gateway->response->code }}</li>
                                                    <br/>
                                                    <li>Gateway Message: {{ $response->gateway->response->message }}</li>
                                                    <br/>
                                                    <li>Transaction ref: {{ $response->id }}</li>
                                                    <br/>
                                                    <li>Transaction Amount: {{ $response->amount }}</li>
                                                    <br/>
                                                    <li>Transaction Currency: {{ $response->currency }}</li>
                                                    <br/>
                                                    <li>{{ $message }}</li>



                                                </ul>
                                            </p>
                                            <a href="/">Go to Home Page</a>
                                    </div>

                                </div>
                            <br>
                            </div> <!-- .infos -->
                        </div> <!-- .content -->
                    </div> <!-- .payment -->
                </div> <!-- .checkout -->
            </div> <!-- .container2 -->
        </div> <!-- #wrapper -->
    </body>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/js/script.js"></script>
</html>
