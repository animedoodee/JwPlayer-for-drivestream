# JwPlayer-for-drivestream
Direct Google Drive Video
ex. https://drive.google.com/file/d/13uxUht2Wq2DgM1O2Zzkq2W10A42H64rf/view
is ID 0B6Z38PT2eRp8Ti1lTlNXUGpZWVk
Use ex. http://localhost:80/embed.php?id=13uxUht2Wq2DgM1O2Zzkq2W10A42H64rf
or ex. http://localhost:80/embed.php?id=https://drive.google.com/file/d/13uxUht2Wq2DgM1O2Zzkq2W10A42H64rf/view

Ex. https://api.animedoodee.com/GD/embed.php?id=https://drive.google.com/file/d/13uxUht2Wq2DgM1O2Zzkq2W10A42H64rf/view


# How to setup
Upload file to Host

Open file server.php editor 
// insert your full URL here with http://
$domain = "";

ex. $domain = "localhost"; or $domain = "https://api.animedoodee.com/";

Create folder cache
