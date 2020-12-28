<!DOCTYPE html>
<html>

<head>
    <title>Trang chủ</title>
    <link href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.0.3/css/font-awesome.css'>
    <?php include_once 'views/components/head.php'?>
    <style>
        .details {padding: 12px 15px;}
        figure {
            width: 100%;
            height: 185px;
            background: #000;
            margin: 0;
        }

        h4.box-title {margin-bottom: 0;line-height: 1em;font-size: 1.3333em;}

        span.price {
            color: #7db921;
            font-size: 1.3333rem;
            text-transform: uppercase;
            float: right;
            text-align: right;
            line-height: 1;
            display: block;
        }

        small {
            display: block;
            color: #838383;
            font-size: 0.5em;
        }
        .box-title small {
            font-size: 10px;
            color: #838383;
            text-transform: uppercase;
            display: block;
            margin-top: 4px;
        }
        .listing-style1.hotel .feedback {
            margin: 5px 0;
            border-top: 1px solid #f5f5f5;
            padding-top: 5px;
            border-bottom: 1px solid #f5f5f5;
        }
        .fa {
            color: #f0715f;
        }
        .listing-style1.hotel .feedback .review {
            display: block;
            float: right;
            text-transform: uppercase;
            font-size: 0.8333em;
            color: #9e9e9e;
        }
        p {
            font-size: 1em;
            line-height: 1.222;
            margin-bottom: 15px;
        }
        a.button {
            display: inline-block;
            background: #828282;
            font-size: 0.8333em;
            line-height: 1.8333em;
            white-space: nowrap;
            text-align: center;
            color: #ffffff;
        }
        a.button:hover {
            background: green;
        }
        button.btn-small, input[type="button"].button.btn-small, a.button.btn-small {
            height: 28px;
            padding: 0 24px;
            line-height: 28px;
            font-size: 0.9167em;
        }
    </style>
</head>
    
<body>
    <div class="wrapper">
        <!-- Sidebar  -->
        <?php include_once 'views/components/sidebar.php'?>
        <!-- Page Content  -->
        <div id="content">
            <?php include_once 'views/components/navbar.php'?>
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <h2>Travelers Choice of Hotels</h2>
                        <div class="box-product">
                            <article class="box">
                                <figure></figure>
                                <div class="details"> <span class="price"><small>avg/night</small>27000000</span>
                                    <h4 class="box-title">Hotel Hilton<small>Albufeira</small></h4>
                                    <div class="feedback">
                                        <div data-placement="bottom" data-toggle="tooltip" class="fa fa-star" title="" data-original-title="4 stars"><span style="width: 80%;" class="five-stars"></span></div> <span class="review">170 reviews</span>
                                    </div>
                                    <p class="description">For what reason would it be advisable for me to think about business content?</p>
                                    <div class="action"> <a class="button btn-small" href="#">BOOK</a> </div>
                                </div>
                            </article>
                        </div>
                    </div>
                    <div class="col-sm-3">
                        
                    </div>
                </div>
            </div>
            <footer class="bg-light text-center text-lg-start">
              <!-- Copyright -->
              <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2)">
                © 2020 Copyright:
                <a class="text-dark" href="https://mdbootstrap.com/">MDBootstrap.com</a>
              </div>
              <!-- Copyright -->
            </footer>
        </div>
    </div>
    <?php include_once 'views/components/script.php'?>
    <script type="text/javascript">
    $(document).ready(function() {
        $('#sidebarCollapse').on('click', function() {
            $('#sidebar').toggleClass('active');
        });
    });
    </script>
</body>

</html>