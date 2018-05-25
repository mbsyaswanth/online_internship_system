<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <!-- <link rel="stylesheet" href="home.css"> -->
    <title></title>
    <style media="screen">
    .dropdown_parent {
  position: relative;
}
.dropdown {
    display: none;
    position: absolute;
    top: 100%;
}
.dropdown_parent:hover .dropdown {
    display: block;
    width: 100%;
    left: 0px;
    box-shadow: 2px 3px 8px 0px #b3b5bb;
}
    </style>
  </head>
  <body>
    <ul>
    <li class="dropdown_parent"> <a onclick="display('catlog')">Catlog</a>
        <div class="dropdown">
          <ul>
            <li> <a onclick="display('catlog'); loadD('catlog','book_box.php?c=cse','true'); ">CSE</a></li>
            <li> <a onclick="display('catlog'); loadD('catlog','book_box.php?c=ece','true');">ECE</a>  </li>
            <li> <a onclick="display('catlog'); loadD('catlog','book_box.php?c=mech','true');">MECH</a> </li>
          </ul>
        </div>
      </li>
    </ul>
  </body>
</html>
