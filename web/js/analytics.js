/*
var server    = window.location.hostname;
var lastmod   = document.lastModified;   
var referrer  = document.referrer;   
var useragent = navigator.userAgent;
var browser   = navigator.appName;
var os        = navigator.platform;

var today     = new Date();
var r         = Math.floor ( Math.random() * 10000000 );
*/

var data = new FormData();
data.append('href', document.location.href);
data.append('referer', document.referrer);
data.append('useragent', navigator.userAgent);
data.append('browser', navigator.appName);
data.append('os', navigator.platform);

var xhr = new XMLHttpRequest();
var pathname = window.location.pathname;
//this should better be an absolute url but this way we have a codeigniter related route specific for this test app
var url = pathname.replace(/\/index.php\/(.*)$/g , '/index.php/exercise4_rest/register.json')
xhr.open('POST', url, true);

xhr.onreadystatechange = function (oEvent) {  
    if (xhr.readyState === 4) {  
        if (xhr.status === 200) {  
          var jsonResponse = JSON.parse(xhr.responseText);
          if (jsonResponse.alert) {
            alert(jsonResponse.alert);
          }
        } else {  
           alert("Error", xhr.statusText);  
        }  
    }  
};  

xhr.onload = function () {
  
};
xhr.send(data);

