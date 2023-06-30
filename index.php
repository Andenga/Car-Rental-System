

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Car Rentals</title>
    <link rel="stylesheet" type="text/css" href="style.css" >  
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
</head>
<body>

    <div class="container">
            <h1>Welcome to Dashboard</h1>
            <a href="logout.php" class="btn btn-warning">Logout</a>
    </div>


    <div class="top-header">
    <header>
        <?php require "header.php"; ?>
    </header>

    <h2>Need a rental car in Iceland? You've come to the right place.</h2>

    <div class="header-selector">
      <p>sdmk</p>  
    </div>

    <div class="grid4">
        <a href="#">See Our Deals</a>
        <a href="#">Vehicles</a>
        <a href="#">Contact us</a>
        <a href="#">Road Safety Measures</a>
    </div>

    </div>




    <main>
        <div class="grid4">
            <img src="/Images/ernest-ojeh-aEytUoE1Tkc-unsplash.jpg" alt="Electric car">
            <img src="/Images/maksym-tymchyk-bb6NaemzpGY-unsplash.jpg" alt="SUV">
            <img src="/Images/frankie-id7EXciI1fY-unsplash.jpg" alt="Motorhome">
            <img src="/Images/jake-blucker-OJX7gIU3E6U-unsplash.jpg" alt="Beautiful home">
        </div>

        <div class="flex2">
            <div class="left">
                <p>Corporate Services</p>
                <p>Join thousands of satisfied corporate clients around Iceland</p>
                <p>Europcar Iceland offer corporate services at many locations nationwide. It is this
                  national Iceland coverage that allows us to offer superior levels of service to
                  our customers.</p>
                <button>Learn More</button>
            </div>
            <div class="right">
                <img src="/Images/eduardo-flores-xpcUYaZtplI-unsplash.jpg" alt="Red car">
            </div>
        </div>


    </main>




    <footer>
        <?php require "footer.php" ?>
    </footer>
    
</body>
</html>