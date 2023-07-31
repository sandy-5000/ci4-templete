<style>
    .para {
        font-size: 19px;
        margin-bottom: 3rem !important;
    }

    .commands {
        background-color: #f0f0f0;
        padding: 10px 20px;
        border-radius: 5px;
        margin-bottom: 3rem !important;
    }
    
    .command {
        font-family: 'Consolas' !important;
        margin: 0 !important;
        padding: 3px 0 3px 0 !important;
    }

    .img, .step {
        margin-bottom: 3rem !important;
    }

    .tab {
        display: inline-block;
        margin-left: 2em;
    }
</style>
<div class="d-flex flex-column body" style="min-height: 100vh;">
    <div class="container mt-5">
        <div class="col-lg-9 col-md-9 col-sm-12 col-12">
            <h3 class="text-left title" style="font-weight: 600">"Hello World!" app with Node.js and Express</h3>
            <h5 class="scyan quote">Do you use Node…? You will.</h5>
            <p class="description para">This article is aimed for beginner developers and anyone interested in getting up and running with Node.js. Before diving into this article, you should be confident enough with JavaScript to know the basic concepts of the language. Technical terms regarding Node will be explained and linked below.</p>
            <div style="height: 30vh"></div>
            
            <h5 class="heading mb-5" style="font-weight: 600">What is Node?</h5>
            <p class="para">Node is an asynchronous event driven JavaScript runtime built upon Chrome’s V8 JavaScript engine. It’s designed to build scalable network applications.</p>
            <p class="para">That being the raw definition, let me clarify. Node.js enables you to write server side JavaScript. You may now be wondering, how? As you know, JavaScript is a language which runs in a browser. The browser’s engine takes JavaScript code and compiles it into commands. The creator of Node.js took Chrome’s engine and built a runtime for it to work on a server. Don’t get confused with the word runtime. It’s an environment where the language can get interpreted. So what do we have now? A way to write JavaScript on the back end.</p>
            <p class="para">Regarding the definition, you might be wondering what the term asynchronous even means in the current context. JavaScript is single threaded, meaning there is only one thread of execution. So you don’t want events to interrupt the main thread of execution. This is what asynchronous means, handling events without interrupting the main thread. Node is based on this non-blocking execution, making it one of the fastest tools for building web applications today. In the following “Hello World” example, many connections can be handled concurrently. Upon each connection the callback is fired, but if there is no work to be done Node will remain asleep.</p>
            <p class="para">There are 6 simple steps in this example, bear with me.</p>
            <h5 class="step">1. Install Node.js for your platform (MacOS, Windows or Linux)</h5>
            <p class="para">The first step is to get yourself an instance of the JavaScript runtime up and running on your local machine. Just smash nodejs.org in your browsers address bar, or click the link above, and you should be good to go. The home screen should give you what you want right away. As I am running Ubuntu on my machine, the respective version of Node.js for my operating system is listed. Go ahead, download and install it. This will give you the tools needed to run a server on your local machine.</p>
            <img class="img" width="700" height="401" loading="lazy" role="presentation" src="https://miro.medium.com/v2/resize:fit:875/1*LWV8A-Fk2YAYfPtWXrtKtQ.png">
            
            <h5 class="step">2. Open a command prompt and type:</h5>
            <div class="commands">
                <p class="command">mkdir myapp</p>
                <p class="command">cd myapp</p>
            </div>
            <p class="para">These commands are universal for whatever OS you’ll be running. The former will create a new directory inside the directory you are currently in, mkdir = “make directory”. The latter will change into this newly created directory, cd = “change directory”. Hard-core windows users can calm down, this will work for you guys too, as it is equivalent to creating a new folder within your file system… only more fancy.</p>
            
            <h5 class="step">3. Initialize your project and link it to npm</h5>
            <p class="para">Now the real fun starts. After creating your directory, very innovatively named myapp, you will need to initialize a project and link it to npm. Np-what? Okay, calm down. Npm is short for node package manager. This is where all node packages live. Packages can be viewed as bundles of code, like modules, which carry out a specific function. This functionality is what we as developers are utilizing. We use the application program interface, the API, provided for us by these modules. What is an API you ask?</p>
            <p class="para">The modules in turn act like black boxes with buttons and levers we can push and pull to get the desired end result.</p>
            <p class="para">Running this command initializes your project:</p>
            <div class="commands">
                <p class="command">npm init</p>
            </div>
            <p class="para">This creates a package.json file in your myapp folder. The file contains references for all npm packages you have downloaded to your project. The command will prompt you to enter a number of things.</p>
            <p class="para">You can enter your way through all of them EXCEPT this one:</p>

            <h5 class="step">4. Install Express in the myapp directory</h5>
            <p class="para">While still in the myapp directory run:</p>
            <div class="commands">
                <p class="command">npm install express --save</p>
            </div>
            <p class="para">The install command will go ahead and find the package you wish to install, and install it to your project. You will now be able to see a node_modules folder get created in the root of your project. This is a crucial step, as you will be able to require any of the recently installed files in your own application files. The addition of —save will save the package to your dependencies list, located in the package.json, in your myapp directory.</p>
            
            <h5 class="step">5. Start your text editor of choice and create a file named app.js.</h5>
            <p class="para">Write the following:</p>
            <div class="commands">
                <p class="command">var express = require('express');</p>
                <p class="command">var app = express();</p>
                <p class="command">app.get('/', function (req, res) {</p>
                <p class="command"><span class="tab"></span>res.send('Hello World!');</p>
                <p class="command">});</p>
                <p class="command">app.listen(3000, function () {</p>
                <p class="command"><span class="tab"></span>console.log('Example app listening on port 3000!');</p>
                <p class="command">});</p>
            </div>
            <p class="para">Here is where you will need to use the package which was recently installed. The first line declares a variable which will contain the module called express, grabbing it from the node_modules folder. The module is actually a function. Assigning the function call to another variable gives you access to a predefined set of tools which will in a great deal make your life much easier. You could view the variable app as an object, whose methods you are utilizing to build the actual program.</p>
            <p>The listen method starts a server and listens on port 3000 for connections. It responds with “Hello World!” for get requests to the root URL (/). For every other path, it will respond with a 404 Not Found.</p>

            <h5 class="step">6. Run the app</h5>
            <p class="para">Type the command:</p>
            <div class="commands">
                <p class="command">node app.js</p>
            </div>
            <p class="para">After running the command, load http://localhost:3000/ in a browser to see the output. You should also see “Example app listening on port 3000!” get logged to the command line.</p>
            <img class="img" width="700" height="398" loading="lazy" role="presentation" src="https://miro.medium.com/v2/resize:fit:875/1*vAF8KgTWu6983trFjK3zew.png">
            <p class="para">That’s it, you’re done. You have successfully created your first Node app. Don’t stop here, keep exploring the wonderful world of Node.js, as it has much more to offer.</p>
            <p class="para">Your finished app should have a folder structure somewhat resembling this.</p>
            <img class="img" width="700" height="384" loading="eager" role="presentation" src="https://miro.medium.com/v2/resize:fit:875/1*QJPDVqdT5sdGyZqWn7LHCw.png">
            <p class="para">That’s it for me today. If you liked this article and if it helped you in any way, feel free to follow me, more tutorials like this one will be coming soon. If you believe this article will be of big help to someone, feel free to share.</p>
            <p class="para">Happy coding :)</p>

            <div style="height: 40vh"></div>
        </div>
        <div class="col-lg-3 col-md-3 col-sm-0 col-0"></div>
    </div>
</div>
