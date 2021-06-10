
  <div class="modal fade" id="homeModal" role="dialog">
    <div class="modal-dialog modal-lg">
    
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title"><strong>Welcome to MYL's Retail Site!</strong></h4>
        </div>
        <div class="modal-body">
        <div class="row text-center">
            <h4>About the website</h4>
        </div>
          <p class="text-justify">This is a sample website for a retail store. The Main Page displays
          the different categories, by selecting one it brings you to the Catalog Page.
          In the catalog page you can search and sort through items. Users with Administrative
          rights can also add, update, and delete items. There is a Log In Page, where a user can 
          optionally register, or use a profile that's already available (this is a sample after all). If a user is
          logged in he can also view the Profile Page which displays his information and allows him to update it</p>
        <hr>
        <div class="row text-center">
          <h5>Features<h5>
          </div>
        <ul >
            <li>Security</li>
            <li>Log In</li>
            <li>Modal Dialogs</li>
            <li>Administrative Authorization</li>
            <li>Search</li>
            <li>Sort</li>
            <li>Create, Read, Update, Delete </li>
            <li>Images</li>
            <li>Pages</li>
            <li>Responsive Design</li>
            <li>Navbar</li>
        </ul>
        
        <hr>
        <div class="row text-center">
          <h5>Main Page</h5>
        </div>
        <p class="text-justify">The main page is the default page of the website. From there you can see a description of the
        website, you can close the modal and reopen later. On top there is a navbar with links to all pages of the website.
        Once you're signed in a fourth link will appear the profile page. On the right side your user name and authorization will appear 
        once your signed in (user, or administrator). In the main page your name if provided will appear. Below you will see a list
        of all categories with picture information about the items, and a random example of each category. Credits for the images appear
        in a panel below. By selecting one of the categories you will go to the catalog page.</p>
        <hr>
        <div class="row text-center">
          <h5>Log In Page</h5>
        </div>
        <p class="text-justify">On this page you can either sign in (using a sample profile or your own). You can also register, you have the option 
        of providing your name and an email address. Signing in will bring you to the main page, once you're signed in the link
        will change to log out, by clicking it you will automatically sign out.</p>
        <hr>
        <div class="row text-center">
          <h5>Catalog Page</h5>
        </div>
        <p class="text-justify">The page displays a list of the items in our catalog. It displays a maximum of six. It can be filtered and 
        sorted based on category, price, and name. You can also search for a specific item or category. Users with 
        administrative rights will also be able to update, delete, and add Items.</p>
        <hr>
        <div class="row text-center">
          <h5>Profile Page</h5>
        </div>
        <p class="text-justify">Only available to users signed in. User will see all available info, and be able to change his name (not username)
        and email. Admins will be able to view all users and grant them Administration rights. This is how you can create your
        own profile, and then using a sample admin profile upgrade yourself</p>
        <p>(On all pages there will be a link to my main portfolio site, feel free to explore my other work.)</p>
        <hr>
        <div class="row text-center">
            <h4>About the Code</h4>
        </div>
        <p class="text-justify"><strong>This website</strong> was written using the following languages and frameworks: PHP, MySql, Html, Css,
         Bootstrap, JavaScript, JQuery, Ajax, and JSON, and Bootstrap plug-in(for the Modals). <br> The pages are loaded initially with php directly, however on the 
         catalog page and profile JavaScript and JQuery are used to handle the front end for the update, delete, add, with ajax 
         calls to php in the back-end. It is possible to use JavaScript for the initial loading as well, however I wanted to show
         how it would be done using php. Php can be used in theory to update and the like, however this would be very slow as 
         it would require reloading the page every time. The data, categories, users, and items, are stored in Mysql database,
         the php uses sql calls to call the information.  </p>
         <p class="text-justify"><strong>Files:</strong> this website was designed along the MVC model. There is a one top and bottom for all pages,
         separate folders for images, js files, and utilities (classed and tools). </p>
         <p class="text-justify"><strong>Images:</strong> The images are stored in a folder. They were downloaded from
         Unsplash there are links to the photographers. They have been compressed for better loading time.</p>
         <p class="text-justify"><strong>Security:</strong> The website uses https to protect data. Where authorization is
         required there are checks in the back-end at several stages to ensure they won't be bypassed (see Sessions). All query calls use
         prepared statements to protect from injection attacks.</p>
         <p class="text-justify"><strong>Sessions:</strong> All data required between pages as well as log in information are stored in sessions</p>
         <p class="text-justify"><strong>Links:</strong> In order to ensure the filter is preserved between the pages, a getLink
         function was created calling the current url and adding the changes.</p>
         <p class="text-justify"><strong>Classes:</strong> There are several classes used. Most are for storing data, but one exception is
         the queryBuilder used for the Registration query. It is particularly complicated, because the input varies on the client's preference. The query
         builder simplifies it by checking the post data for which fields were entered. Although the update for the catalog and profile,
         have similar difficulties, a query builder would have not been useful there , as the item update requires input for 
         the front end, and the profile update is relatively simple with only two fields.</p>  
         <p class="text-justify"><strong>Filter:</strong> The Catalog Page has the ability to search and sort. Each page has a maximum
         of six. It's done using php as that's how the data is first loaded.</p>
         <p class="text-justify"><strong>Create, Update, Delete</strong> is possible for admins in the catalog page and for all
         users on the profile page. It's done using JavaScript, JQuery, Ajax, as well as php in the backend. </p>
         <p class="text-justify"><strong>Sql:</strong> Data is called and updated using php and mysql. All queries are done with a prepared 
         statement (see security). Joins are used as well as order and group. In the home page a sub-query is used to get a random item in
         each category</p>
         <p class="text-justify"><strong>Db connection:</strong> A db class is used with a db instance to ensure that only one connection is
         used per a page</p>
         <p class="text-justify"><strong>Modals:</strong> There are several modal dialog boxes (pop-up). They are called using the Bootstrap plug-in. They give the client valuable information,
         as well as giving him a chance to cancel his decision ("are you sure you want to delete this item?")</p>
         <p class="text-justify"><strong>Design:</strong> The design of the website is built using the Bootstrap (version 3.7) front-end framework,
         styling is with basic Css</p>
         <p class="text-justify"><strong>Code:</strong> The code itself is written in a clear format with comments</p>
         <p class="text-justify">To see more about the code visit <a href="https://github.com/mjscode/PcsClass/tree/master/myPortfolio">me at GitHub</a></p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>

