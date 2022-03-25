

## About JWT Authentication

JSON Web Token (JWT) is an open standard (RFC 7519) that defines a compact and self-contained way for securely transmitting information between parties as a JSON object. This information can be verified and trusted because it is digitally signed. JWTs can be signed using a secret (with the HMAC algorithm) or a public/private key pair using RSA or ECDSA.

Here are some scenarios where JSON Web Tokens are useful:

<b>Authorization:</b> This is the most common scenario for using JWT. Once the user is logged in, each subsequent request will include the JWT, allowing the user to access routes, services, and resources that are permitted with that token. Single Sign On is a feature that widely uses JWT nowadays, because of its small overhead and its ability to be easily used across different domains.

<b>Information Exchange:</b> JSON Web Tokens are a good way of securely transmitting information between parties. Because JWTs can be signed—for example, using public/private key pairs—you can be sure the senders are who they say they are. Additionally, as the signature is calculated using the header and the payload, you can also verify that the content hasn't been tampered with.

<h4>What is the JSON Web Token structure?</h4><hr>
<b>Header</b>
The header typically consists of two parts: the type of the token, which is JWT, and the signing algorithm being used, such as HMAC SHA256 or RSA.


<b>Payload</b>
The second part of the token is the payload, which contains the claims. Claims are statements about an entity (typically, the user) and additional data. There are three types of claims: registered, public, and private claims.

<b>Signature</b>
To create the signature part you have to take the encoded header, the encoded payload, a secret, the algorithm specified in the header, and sign that.

<h3>Getting Started</h3><hr>
Now we will see how to setup the project in our local system.Click on them to install it on your system.

<h4>Prerequisites</h4>
<a href="https://computingforgeeks.com/how-to-install-php-on-ubuntu/">1.php 7.2 above version and its packages.</a><br>
<a href="https://www.cyberciti.biz/faq/how-to-install-curl-command-on-a-ubuntu-linux/">2.curl</a><br>
<a href="https://tecadmin.net/install-php-composer-on-ubuntu/">3.composer</a><br>

<h4>Softwares Required</h4>
1.<a href="https://www.jetbrains.com/help/phpstorm/installation-guide.html#toolbox">php Strome</a>/<a href="https://www.makeuseof.com/how-to-install-visual-studio-code-ubuntu/#:~:text=To%20install%20Visual%20Studio%20Code%2C%20launch%20the%20Ubuntu%20Software%20app,directly%20from%20the%20Applications%20menu.">VS Code.</a><br>
2.<a href="https://www.journaldev.com/26623/install-laravel-on-ubuntu">Laravel Framework ^7.5.*<a><br>
3.<a href="https://www.cockroachlabs.com/docs/stable/install-cockroachdb-linux.html">Cockroach DB<a><br>
4.<a href="https://linuxize.com/post/how-to-install-postman-on-ubuntu-20-04/">Postman<a><br>

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.
    
## Getting Started with Cockroach DB

This [Documentation](https://www.cockroachlabs.com/docs/cockroachcloud/quickstart.html) you how to get started with CockroachDB Cloud quickly. You'll create a free CockroachDB Serverless (beta) cluster, and then insert and read some sample data from a sample application.
    
## Postman

Welcome to the Postman docs! This is the place to find official information on [how to use Postman](https://learning.postman.com/docs/getting-started/introduction/) in your API projects.   
    
    
<h5>Steps to start the project</h5>
    1.Download Code from branch [gurukiranbadiger-JWT-AUTH](https://github.com/Artisans-LSSG/secure/edit/gurukiranbadiger-JWT)<br>
    2.Open it with vscode/phpstrome<br>
    3.[Initallize CockroachDB](https://www.cockroachlabs.com/docs/stable/start-a-local-cluster.html)in required mode.<br>
      3.a Create Database by name "secure".<br>
    4.Config .env file for project <br>
    5.Migrate your project Database<br>
       Using  "$ php artisan migrate"<br>
    6.Send Data useing POSTMAN.
    
 <h3>About</h3><hr>
                                                      
    This branch consists API's
    
    1.New User Registration. 

    2.Login  with initialisation of JWT token. 

    3.Refreshing JWT token for User. 

    4.logout

    5.User Details view 
    
 <p> This system consist of new user registration and provideing a proper authenticated service useing JWT Tokens whenever user logs in a special JWT token will be generated for that specific user.and later when he logs out that token will be distructed,By the help of that token we provide a user a refreshed token and we can also featch his details with the above project. </p>



      
    
