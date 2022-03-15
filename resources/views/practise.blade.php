<!doctype html>
<html lang="en">
  <head>
    <title>Signup</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        body{
           font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }
        * {box-sizing: border-box}
        input[type=text], input[type=password] {
           width: 100%;
           font-size: 18px;
           padding: 15px;
           margin: 5px 0 22px 0;
           display: inline-block;
           border: none;
           background: #f1f1f1;
        }
        label{
           font-size: 15px;
        }
        input[type=text]:focus, input[type=password]:focus {
           background-color: #ddd;
           outline: none;
        }
        hr {
           border: 1px solid #f1f1f1;
           margin-bottom: 25px;
        }
        button {
           font-size: 18px;
           font-weight: bold;
           background-color: rgb(10, 119, 13);
           color: white;
           padding: 14px 20px;
           margin: 8px 0;
           border: none;
           cursor: pointer;
           /* width: 50%; */
           opacity: 0.9;
        }
        button:hover {
           opacity:1;
        }
        .cancel {
           padding: 14px 20px;
           background-color: #ff3d2f;
        }
        .formContainer {
           padding: 16px;
        }
        .formContainer p{
           font-size: 18px;
        }
        .container{
            width: 50%;
            border: #ff3d2f;
            border-style: double;
        }
        .basic{
            width: 50%;

        }
        </style>
  </head>
  <body>
      
    <form class="container" action="" method="post">
        <div class="formContainer">
        <h1>Sign Up Form</h1>
        <hr>
        <label for="text"><b>First Name</b></label>
        <input type="text" placeholder="Enter your First Name" name="email" required>
        <label for="text"><b>Last Name</b></label>
        <input type="text" placeholder="Enter your Last Name" name="email" required>
        <label for="email"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="password"><b>Password</b></label>
        <input type="password" placeholder="Enter Password" name="password" required>
        <label for="repeatPassword"><b>Repeat Password</b></label>
        <input type="password" placeholder="Repeat Password" name="repeatPassword" required>
        <label for="text"><b>Email</b></label>
        <input type="text" placeholder="Enter Email" name="email" required>
        <label for="text"><b>Nationality</b></label>
        <br>
        @php

        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", 
        "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", 
        "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", 
        "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", 
        "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador",
         "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", 
         "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", 
         "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland",
          "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea,
           Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", 
           "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia",
            "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of",
             "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", 
             "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", 
             "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", 
             "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)",
              "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", 
              "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of",
               "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", 
               "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)",
                "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");
        
        @endphp
        <select>
          @foreach ($countries as $country)
            <option>
              {{$country}}
            </option>
          @endforeach
        
        </select>
        

        <p>By creating an account you agree to our <a href="#"
        style="color:dodgerblue">Terms & Privacy</a><p>
        <div>
        <button type="button" class="cancel">Cancel</button>
        <button type="submit" class="signup">Sign Up</button>
        </div>
        </div>
        </form>      
  </body>
</html>