#Advertisement-manager

*Scroll down for the Hungarian version*

### Requirements for running the project
I used xampp for run an Apache- and MySQL server.
- For the database, I used the advertisements.sql which has everything to create database including some test data.
- As for the application itself I have ran it with the help of the Apache server. I saved the project into the htdocs folder and used http://localhost/Advertisements-manager/ url.

### Using the website
- The first page is the index.php, which has a navigation bar that allows the user to navigate between the other sites by using it. This page greets the user and later it will be the /home page.
- The second page is the usersList.php which lists the current users from the database and the url becomes /users. On this page the user has the opportunity to add new users to the database.
- The last page is the advertisement.php which lists the advertisement title and the name of the user who uploaded it and the url becomes /advertisements. This page like before on /users site, the user can upload new advertisement, where he need to type in the title, and choose the user through the dropdown menu.

### The structure of the project
- In the root folder there is the index.php, the userList.php, and the advertisement.php. These three file represent the view part of the MVC. This folder also has the stlyes.css, the .htaccess, the database called advertisement.sql, the head.php which contains the head of the files of the view, and this README.MD. There we have 2 folders too, one of them contains Models and the other contains the Controllers.
- In the Controller folder, there is the userController.php and the advertisementController.php. These files communicate with the model file when the user create a new user or advertisement, and also communicate with the view file where receive the data with a POST request, and return the result of the function as a JSON response. The result is used for the sweetAlert.
  - In the Controller files there are two function and a switch case. One of the function is not implemented yet. The other one is communicate and send the data to insert it into the database. The switch would be used to know which function is the correct for the user.
- In the Model folder, there is the DB.php, the User.php, and the Advertisements.php.
  - The DB.php has only one function, which is establishes a connection to the database using PDO.
  - The User.php has three functions, the followings:
    - createUser() : Creates a new user in the database.
    - getUsers() : Gets all users from the database.
    - showUsers() : Shows all users by calling the getUsers method.
  - And the Advertisements.php has two more functions, the followings:
    - createAdvertisement() : Creates a new advertisement in the database.
    - showAdvertisements() : Shows all advertisements along with the names of the users who created them.

### Using the MVC
- This was the first time when I used MVC in a project, but I hope, I solved it well.

_________________________________________________________________________

### A program futtatásához szükséges részek
Személy szerint xampp-ot használtam Apache-, illetve MySQL szerver futtatására.
- A projekt fő könyvtárában van az advertisements.sql fájl, amely segítségével létrehozható az adatbázis, illetve van benne pár dummy adat amivel lehet tesztelni.
- Xampp-ot használva elég volt számomra a htdocs mappába helyeznem az Advertisements mappát és a http://localhost/Advertisements/ url-en elértem a projektet.

### A weboldal használata
- Az első oldal az index.php, amely tartalmaz egy navigációs sávot, amely lehetővé teszi a felhasználó számára, hogy navigáljon a többi oldal között. Továbbá ez az oldal üdvözli a felhasználót, és később ez lesz a /home oldal.
- A második oldal a usersList.php, amely listázza az aktuális felhasználókat az adatbázisból, és az URL /users lesz. Ezen az oldalon a felhasználónak lehetősége van új felhasználókat hozzáadni az adatbázishoz.
- Az utolsó oldal az advertisement.php, amely listázza a hirdetések címét és a felhasználó nevét, aki feltöltötte azt, és az URL /advertisements lesz. Ezen az oldalon, akárcsak a /users oldalon, a felhasználó új hirdetést tölthet fel, ahol be kell írnia a címet, és ki kell választania a felhasználót egy legördülő menüből.

### A projekt struktúrája
- A Főkönyvtárban található az index.php, a userList.php és az advertisement.php. Ez a három fájl az MVC nézet részét képviseli. Továbbá ez a mappa tartalmaz egy styles.css fájlt, egy .htaccess fájlt, az adatbázist advertisement.sql néven, a head.php-t, amely tartalmazza a nézet fájlok fejét, és ezt a README.MD-t. Itt található még 2 mappa is, az egyik a Modellek, a másik a Vezérlők fájljait tartalmazza.
- A Vezérlő mappában található a userController.php és az advertisementController.php. Ezek a fájlok kommunikálnak a modell fájlokkal, amikor a felhasználó új felhasználót vagy új hirdetést hoz létre, és kommunikálnak a nézet fájllal is, ahol POST kérésben érkező adatokat fogadják, és visszaküldik a függvény eredményét JSON-válaszként. Az eredmény visszajelzésekhez van használva.
  - A Vezérlő fájlokban két függvény és egy "switch case" található. Az egyik függvény még nincs megvalósítva időhiány miatt. A másik függvény viszont kommunikál a model fájlokkal és elküldi az adatokat, hogy azokat a model az adatbázisba illessze. A switch a megfelelő függvény kiválasztásához szükséges.
- A Modell mappában található a DB.php, a User.php és az Advertisements.php.
  - A DB.php csak egy függvényt tartalmaz, amely PDO használatával létrehozza az adatbázis kapcsolatot.
  - A User.php három függvényt tartalmaz, a következőket:
    - createUser() : Létrehoz egy új felhasználót az adatbázisban.
    - getUsers() : Lekéri az összes felhasználót az adatbázisból.
    - showUsers() : Megjeleníti az összes felhasználót a getUsers metódus meghívásával.
 - Az Advertisements.php két további függvényt tartalmaz, a következőket:
   - createAdvertisement() : Létrehoz egy új hirdetést az adatbázisban.
   - showAdvertisements() : Megjeleníti az összes hirdetést a felhasználók neveivel együtt, akik létrehozták a hirdetéseket.

### Az MVC használata
Ez volt az első alkalom, amikor MVC-t használtam egy projektben, de remélem, jól valósítottam meg.





