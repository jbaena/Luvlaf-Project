/**************************************************************************************\
 *  Knock Knock Joke Application System                                               *
 *  Copyright (c) 2013 John Baena                                                     *
\**************************************************************************************/

WELCOME TO THE INSTRUCTION MANUAL FOR THE KNOCK KNOCK JOKE APPLICATION SYSTEM.

---------------------------------------------------------------------------------------
1. Setting up the file system
---------------------------------------------------------------------------------------

To get the Knock Knock joke site running on your server of choice, simply copy the source
code from the master file at https://github.com/jbaena/Luvlaf-Project. All the script, style
and page sources are already set up for you and ready to go.

---------------------------------------------------------------------------------------
1.1 File system structure
---------------------------------------------------------------------------------------

Here is an overview of the file structure used for this project:

> * Project Folder * (I recommend calling it knock_knock, but feel free to 
                      call is whatever you wish)
  > ajax (AJAX-PHP source goes here)
  > dev (dev code that will NOT be in the final product goes here)
  > images
    > icons
    > sprite_sheet
  > script
  > style
    > page_style

You may notice that some of the folders in your project are omitted from this list. This
is because those folders are libraries created by third-party developers and should not
be modified if you do not understand their purpose. 

If you feel confident that you understand their purpose, you may change them AT YOUR OWN RISK.

---------------------------------------------------------------------------------------
1.2 Where everything goes
---------------------------------------------------------------------------------------

Here is an explaination of what goes where and why:

/ajax			: All AJAX-PHP code, particually the response code should be placed in this folder
/dev			: Developer code that should NOT be located within the final release of the project
			  must be placed within this folder. Files such as database manipulation scripts
			  and other such dangerous scripts must be removed from the final build of the
			  project.
/images			: All images go here (pretty self explainatory)
/images/icons		: Icons go here
/images/sprite_sheet	: Sprite Sheets (large images that are a collection of a group of smaller images)
			  are placed in this folder.
/script			: Javascript files, classes and objects go here
/style			: CSS style sheets go here
/style/page_style	: Page specific styles go here

---------------------------------------------------------------------------------------
2. Setting up the database server
---------------------------------------------------------------------------------------

Before the system is ready for prime time, you will need to run the create.php script
located in the dev folder of your project (ie. if your project is located in the 
C:/Projects/Luvlaf folder, then the script will be located in the directory
C:/Projects/Luvlaf/dev folder).

---------------------------------------------------------------------------------------
2.1 Overview of DB Tables
---------------------------------------------------------------------------------------

Here is the overview of the database table:

~~~~~~~~ LEGEND ~~~~~~~~~
~                       ~
~   > Database Table    ~
~   * Key               ~
~   - Generic Field     ~
~                       ~
~~~~~~~~~~~~~~~~~~~~~~~~~

> knock_knock_joke
  * id
  - response_1
  - response_2
  
---------------------------------------------------------------------------------------
3. Adding new page
---------------------------------------------------------------------------------------

In order to ensure that the project maintains a consistent look and feel, use the
following code bits to ensure that the site looks consistent across all pages.


The folowing should be place at the top of every new page:

	<?php
	require_once('web_essentials.php');
	start_web("Home", $script, $style);
	?>

And the following and the end of each page:

	<?php end_web(); ?>

---------------------------------------------------------------------------------------
4. Adding new scripts and styles
---------------------------------------------------------------------------------------

To add a new javascript file or style sheet to you're new page, there are 2 methods available
to you that will allow you to extend the functionality of the project.

The first method will allow you to add a new script/style to all pages within the project, making
it easier and faster to import new scripts to your project. To do this, simply add the external script
into the header file located at "/header.php". Use this method if a script is being used 
globally by a large number of pages within the project

The second method will allow you to add a script/style for a specific page within the project.
You achieve this by making a slight change in the header of the page like so:

	<?php
	require_once('web_essentials.php');
	
	$script = |My new script file|.js;
	$style =  |My new style file|.css;
	
	start_web("Home", $script, $style);
	?>

---------------------------------------------------------------------------------------
5. Live Release
---------------------------------------------------------------------------------------

When the system is ready for the live release, remember to remove the /dev folder from
the project as these scripts are not necessary in running the project and may contain
dangerous files that can corrupt the project if left in the live release.