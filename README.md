# JwPlayer-for-drivestream
Direct Google Drive Video
ex. https://drive.google.com/open?id=0B6Z38PT2eRp8Ti1lTlNXUGpZWVk
is ID 0B6Z38PT2eRp8Ti1lTlNXUGpZWVk
Use ex. http://localhost:80/embed.php?id=0B6Z38PT2eRp8Ti1lTlNXUGpZWVk
or ex. http://localhost:80/embed.php?id=https://drive.google.com/file/d/0B6Z38PT2eRp8Ti1lTlNXUGpZWVk/view

Ex. http://api.animedoodee.com/?link=https://drive.google.com/file/d/0B6Z38PT2eRp8Ti1lTlNXUGpZWVk/view


# How to setup
Upload file to Host

Open file server.php editor 
// insert your full URL here with http://
$domain = "";

ex. $domain = "localhost"; or $domain = "https://api.animedoodee.com/";

Create folder cache
