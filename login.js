var webpage = require('webpage');
var page = webpage.create();

page.settings = {
  loadImages: false,
  javascriptEnabled: true,
  encoding: "utf8",
  userAgent: 'Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/58.0.3029.110 Safari/537.36',
};
 
var page = require('webpage').create();
var fs = require('fs');
phantom.cookiesEnabled = true;
page.viewportSize = {width: 1920, height: 1080}; 
page.open("https://xxxxx.xxx/ccAdmin", function(status) {
  if (status === "success") {
    page.evaluate(function() {
        document.getElementById("Login").value = "platonovaa";
        document.getElementById("Password").value = "U6vgcFuH";
        document.querySelector("button[type=submit]").click();
    });
    window.setTimeout(function() {
    fs.write('1.html', page.content, 'w');      
    

    var url = "https://xxxx.xxx/ccadmin/crashworks/list";

        page.open(url, function (status) {
            setTimeout(function () {
                page.evaluate(function () {
                    console.log('haha');
                });
                //page.render("google.png");
		fs.write('/usr/local/src/parser/1580.html', page.content, 'w');                
        	phantom.exit();
		}, 15000);
        });


    }, 25000);
  
    


}
});
