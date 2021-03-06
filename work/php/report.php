<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>Report from the course sections</title>
        <link rel="stylesheet" href="css/style.css">
        <link rel="icon" href="favicon.ico">
    </head>

    <body id="body">
        
        <?php include "view/header.php";?>

        <article class="report_article">

            <h1>Report page for course DA377B VT20</h1>

            <section>
                <h2>S01</h2>
                <p><em>- Did you before know about the techniques Git, GitHub, Markdown and/or GitHub Pages?</em><br>
                I have used Git and Git and Github previously in other courses. I've heard of both Markdown and Github Pages and read about them but never used them.</p>

                <p><em>- Have you ever created websites before?</em><br>
                Yes but simple ones. I created basic websites on my own using HTML and CSS.</p>

                <p><em>- Briefly explain your experience and knowledge of web application development.</em><br>
                As I mentioned before I have some knowledge of HTML and CSS. For backend I have played around with Node.js and Spring Boot but never worked on any project, just my own leisure. For the Mobile Development course project I used PHP and MySQL. In Software Engineering II, I worked with Java servlets and XML parsing.</p>

                <p><em>- What is your TIL for this course section?</em><br>
                Today I learned how to use Github Pages, fork a Github repo and keep it updated.</p>
            </section>

            <section>
                <h2>S02</h2>
                <p><em>- Have you any previous experience of HTML, CSS and/or JavaScript?</em><br>
                Yes. I practiced on my own free time with HTML and CSS mostly.</p>

                <p><em>- Explain the role of HTML, CSS and JavaScript in web development.</em><br>
                HTML stands for Hypertext Markup language and is the standard language to write documents to be displayed in web browsers.<br>
                CSS stands for Cascade Style Sheets and is used to style HTML documents.<br>
                Javascript is a programming language that can be used for both front and backend web development. It allows for dynamic content, for example handling events or creating/modifying elements in a webpage.</p>

                <p><em>- Have you any previous experience of HTML, CSS and/or JavaScript?</em><br>
                Yes. I practiced on my own free time with HTML and CSS mostly.</p>

                <p><em>- Give a brief explanation of how the browser, the HTTP protocol and the web server interacts.</em><br>
                The browser's function is to display webpages in a human readable format. In order to do so, it contacts a web server where HTML documents are kept. The communication between them is made using the HTTP protocol.<br>
                When a browser needs to load a web page, that is not cached locally, it sents a HTTP GET request to the page's web server, if the request is successful the web server will reply back with the needed HTML document and the web browser can then display the webpage.</p>

                <p><em>- What is your TIL for this course section?</em><br>
                For this section I mostly learned CSS related content. I read about using Flexbox in CSS in order to position elements in HTML pages and used that knowledge to complete the assignment.
                I had dificulties keeping the footer always at the bottom of the pages, but with help from Flexbox tutorials I was able to do it.</p>
            </section>

            <section>
                <h2>S03</h2>
                <p><em>- Do you have any previous experience of client side JavaScript?</em><br>
                No.</p>

                <p><em>- Can you compare and relate the JavaScript language to any other language you know?</em><br>
                The language I'm most confortable is Java, from what I've used so from JavaScript I see similarities but it takes me longer to "read" and understand it. Declaring variables in JavaScript with "var" takes me longer to figure out what's going on.<br>
                Also testing for equality is different, first time I heard of "triple equals".</p>

                <p><em>- Describe how you worked with the coding exercise, what grade do you aim for and how did your code turn out to be?</em><br>
                I aimed for grade 5. I decided to work with one area from start to end and only when done I would move to the next. I started with the duck, then moved to the schools and then the flags.<br>
                I tried my best to organize my code, I think the js code is looking easy to follow. Perhaps the CSS side could be better specially for the flags because I ended wrapping divs in divs.</p>

                <p><em>- What is your TIL for this course section?</em><br>
                For this section I mostly learned JavaScript and CSS related content. Learned how to manipulate HTML pages with JavaScript, learned about the fetch API and create CSS transitions.
                </p>
                </section>

            <section>
                <h2>S04</h2>
                <p><em>- Tell me about your previous experience on node/npm or any equal programming tools.</em><br>
                I've played around with it before but my experience is very limited.</p>

                <p><em>- How do you feel about working with JavaScript, Node and Express?</em><br>
                It's not easy, especially because we have to learn all this in a short period of time. Express seems to help with the speed one takes to setup a webpage, but at the same time it feels like I might be skipping basic ground knowledge. </p>

                <p><em>- Describe how you worked with the coding exercise, what grade do you aim for and how did your code turn out to be?</em><br>
                I gradually worked my way up from grade 3, 4 to 5. I tried to organize the code best I could, but I'm not so happy with how it turned out. To render the lotto tables I ended repeating code and I guess it could be done better.</p>

                <p><em>- What is your TIL for this course section?</em><br>
                Express and ejs was totally new to me, so that was a first. I learned about routing and how to render js pages.
                </p>
            </section>

            <section>
                <h2>S05</h2>
                <p>Here is the text for this section.</p>
            </section>

            <section>
                <h2>S06</h2>
                <p>Here is the text for this section.</p>
            </section>

            <section>
                <h2>S07</h2>
                <p>Here is the text for this section.</p>
            </section>

            <section>
                <h2>S08</h2>
                <p>Here is the text for this section.</p>
            </section>

            <section>
                <h2>S09</h2>
                <p>Here is the text for this section.</p>
            </section>

            <section>
                <h2>S10</h2>
                <p>Here is the text for this section.</p>
            </section>
        </article>

        <?php include "view/footer.php";?>

        <img id="duck" class="duck" src="img/duck.png" alt="duck image">

        <script type="text/javascript" src="js/main.js"></script>

    </body>
</html>
