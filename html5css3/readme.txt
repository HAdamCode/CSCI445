1) The menu items are now display vertically instead of horizontaly.

2) The menu items go back to being displayed horizontaly but without the spacing they had before. 

3) We dont need the hamburger menu when the screen width is wide because all of the menu items can fit at the top of the page.
    When we shrink the screen, we can no longer fit all of the menu items in the top row so we move them to the hamburger menu. 
    The code below specifically displays the hamburger menu when the screen width is less than 600px.

    @media screen and (max-width: 600px) {
    .topnav.responsive {position: relative;}
    .topnav.responsive .icon {
        position: absolute;
        right: 0;
        top: 0;
    }
    .topnav.responsive a {
        float: none;
        display: block;
        text-align: left;
    }
    }

4) The home menu button is the only button left when the screen width shrinks because we set all buttons that are not first to have a display
    type of none as shown below. 

    @media screen and (max-width: 600px) {
    .topnav a:not(:first-child) {display: none;}
    .topnav a.icon {
        float: right;
        display: block;
    }
    }

5) First we get the element base on it's id which happens to be the menu that opens and closes. 
    If the screen width is small and the menu button is clicked, it changes the class name so that the style sheet can make the menu items visible. 
    If the screen width is small and the menu button is clicked again, it changes the class name back to the original class name which makes the menu
    items not visible.