# Contact Catalogue

Description
----
The Contact Catalogue (Contacten Catalogus) contains contact details on persons and organisations.

The Contact Catalogue contains lists of contacts, from a source perspective it usually has an additional or replacement task with respect to the BRP. In other words, in the Contact Catalogue we find people that we do not get from the BRP. This may be because these persons are not in the BRP, we do not yet know what a person's BSN is or because we simply do not have any rights or access to the BRP from the process we are working with.

In addition, the Contact Catalogue functions as a Common Ground variant of the contact list as we know it from an e-mail application or telephone. It is therefore also possible to include people in a contact list. With this we can realise contact and functionalities for users (in application form).

Finally, the Contact Catalogue offers the possibility to store data from organizations. This component deliberately supports only the personal data, but can form a Customer Relation Management system in collaboration with the CMR and ORC, whereby the ORC offers the possibility to map leads, for example.

Additional Information
----

- [Contributing](CONTRIBUTING.md)
- [ChangeLogs](CHANGELOG.md)
- [RoadMap](ROADMAP.md)
- [Security](SECURITY.md)
- [Licence](LICENSE.md)


Installation
----
We difrentiate between two way's of installing this component, a local installation as part of the provided developers toolkit or an [helm](https://helm.sh/) installtion on an development or production envirnoment. 

#### Local installation
First make sure you have [docker desktop](https://www.docker.com/products/docker-desktop) running on your computer. The clone the repository to your local machine and use your favorite commandline interface to navigate to your 

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
