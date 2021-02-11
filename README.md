# Contact Catalouge

Description
----
The contact catalouge (Contacten Catalogus) contains contact details on persons and organisations

Het Contacten Catalogus bevat lijsten van contact personen, hiermee heeft het vanuit bron perspectief doorgaans een aanvullende of vervangende taak ten opzichte van het BRP. Met andere woorden in het Contacten Component vinden we personen die we niet uit het BRP halen. Dat kan zijn, omdat deze personen niet in het BRP staan, we nog niet weten wat het BSN van een persoon is of omdat we simpelweg geen rechten of toegang hebben tot het BRP vanuit het proces waar we mee bezig zijn.

Daarnaast fungeert het Contacten Component als een Common Ground variant van de contactpersonenlijst zoals we die kennen vanuit een e-mail applicatie of telefoon. Het is dus ook mogelijk om personen op te nemen in een contactenlijst. Hiermee worden contact en functionaliteiten voor gebruikers (in application form) gerealiseerd.

Als laatste biedt het Contacten Component de mogelijkheid om gegevens van organisaties op te slaan. Het component ondersteunt bewust alleen de persoonsgegevens, maar kan in samenwerking met het CMR en ORC een Customer Relation Management systeem vormen, waarbij het ORC de mogelijkheid biedt om bijvoorbeeld leads in kaart te brengen.

Additional Information
----

- [Contributing](CONTRIBUTING.md)
- [ChangeLogs](CHANGELOG.md)
- [RoadMap](ROADMAP.md)
- [Security](SECURITY.md)
- [Licence](LICENSE.md)


Installation
----
We differentiate between two way's of installing this component, a local installation as part of the provided developers toolkit or an [helm](https://helm.sh/) installation on an development or production environment. 

#### Local installation
First make sure you have [docker desktop](https://www.docker.com/products/docker-desktop) running on your computer. Then clone the repository to a directory on your local machine through a [git command](https://github.com/git-guides/git-clone) or [git kraken](https://www.gitkraken.com) (ui for git). If successful you can now navigate to the directory of your cloned repository in a command prompt and execute docker-compose up. This will build the docker image and run the used containers and when seeing the log from the php container: "NOTICE: ready to handle connections", u are ready to view the documentation at localhost on your preferred browser.

#### Instalation on Kubernetes or Haven


For an in depth installation guide you can refer to the [installation guide](INSTALLATION.md).

Standards
----

This component adheres to international, national and local standards (in that order), notable standards are:

- Any applicable [W3C](https://www.w3.org) standard, including but not limited to [rest](https://www.w3.org/2001/sw/wiki/REST), [JSON-LD](https://www.w3.org/TR/json-ld11/) and [WEBSUB](https://www.w3.org/TR/websub/)
- Any applicable [schema](https://schema.org/) standard
- [OpenAPI Specification](https://github.com/OAI/OpenAPI-Specification/blob/master/versions/3.0.0.md)
- [GAIA-X](https://www.data-infrastructure.eu/GAIAX/Navigation/EN/Home/home.html)
- [Publiccode](https://docs.italia.it/italia/developers-italia/publiccodeyml-en/en/master/index.html)
- [Forum Stanaardisatie](https://www.forumstandaardisatie.nl/open-standaarden)
- [NL API Strategie](https://docs.geostandaarden.nl/api/API-Strategie/)
- [Common Ground Realisatieprincipes](https://componentencatalogus.commonground.nl/20190130_-_Common_Ground_-_Realisatieprincipes.pdf)
- [Haven](https://haven.commonground.nl/docs/de-standaard)
- [NLX](https://docs.nlx.io/understanding-the-basics/introduction)
- [Standard for Public Code](https://standard.publiccode.net/), see the [compliancy scan](publiccode.md) for further information. 

This component is based on the following [schema.org](https://schema.org) sources:
- [Address](https://schema.org/PostalAddress)
- [Person](https://schema.org/Person)

Tutorial
----

For information on how to work with the component you can refer to the tutorial [here](TUTORIAL.md).

#### Setup your local environment
Before we can spin up our component we must first get a local copy from our repository, we can either do this through the command line or use a Git client. 

For this example we're going to use [GitKraken](https://www.gitkraken.com/) but you can use any tool you like, feel free to skip this part if you are already familiar with setting up a local clone of your repository.

Open gitkraken press "clone a repo" and fill in the form (select where on your local machine you want the repository to be stored, and fill in the link of your repository on github), press "clone a repo" and you should then see GitKraken downloading your code. After it's done press "open now" (in the box on top) and voilá your codebase (you should see an initial commit on a master branch).

You can now navigate to the folder where you just installed your code, it should contain some folders and files and generally look like this. We will get into the files later, lets first spin up our component!

Next make sure you have [docker desktop](https://www.docker.com/products/docker-desktop) running on your computer.

Open a command window (example) and browse to the folder where you just stuffed your code, navigating in a command window is done by cd, so for our example we could type 
cd c:\repos\common-ground\my-component (if you installed your code on a different disk then where the cmd window opens first type <diskname>: for example D: and hit enter to go to that disk, D in this case). We are now in our folder, so let's go! Type docker-compose up and hit enter. From now on whenever we describe a command line command we will document it as follows (the $ isn't actually typed but represents your folder structure):

```CLI
$ docker-compose up
```

Your computer should now start up your local development environment. Don't worry about al the code coming by, let's just wait until it finishes. You're free to watch along and see what exactly docker is doing, you will know when it's finished when it tells you that it is ready to handle connections. 

Open your browser type [<http://localhost/>](https://localhost) as address and hit enter, you should now see your common ground component up and running.

Developers toolkit and technical information
----
- Waar vind het data model waar vind ik de OAS documantie en de postman colletie

Contributing
----
- Terug verwijsen naar locaal opspinnen, dooverwijzen naar onze github pagina (voor overige componenten)
- Dooverwijzen naar commonground.conduction.nl voor makenlijk uitrollen van test omgeving
- Doorverwijzen naar de tutotial in de example repro, voor als als mensen zelf componentne optuien

- Ecosysteem -> commonground.nl

- [Contributing](CONTRIBUTING.md)



Credits
----

Information about the authors of this component can be found [here](AUTHORS.md)





Copyright © [Utrecht](https://www.utrecht.nl/) 2019
