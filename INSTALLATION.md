# Installation



## Setting up tiller

## Setting up helm

## Setting up Kubernetes Dashboard
Nadat we helm hebben geïnstalleerd, kunnen we helm ook meteen gebruiken om gemakkelijke kubernetes dashboard te downloaden
helm install stable/kubernetes-dashboard --name dashboard --kubeconfig="kubernetes/kubeconfig.yaml" --namespace="kube-system"

Maar voordat we op het dashboard kunnen inloggen hebben we eerste een token nodig, die kunnen we ophalen via de secrets 
kubectl -n kube-system get secret  --kubeconfig="kubernetes/kubeconfig.yaml"

Omdat we deployen vanuit helm over tiller is het handig om het dashboard ook als tiller te gebruiken. Kijk naar het tiller secret <tiller-token-XXXXX>, en vraag vervolgens het token daarvoor op met:

kubectl -n kube-system describe secrets tiller-token-5m4tg  --kubeconfig="kubernetes/kubeconfig.yaml"

Vanaf hier is het simpel we starten een proxy op
kubectl proxy --kubeconfig="api/helm/kubeconfig.yaml"
En kunnen vervolgens het dashboard aanroepen in onze favoriete browser met:
http://localhost:8001/api/v1/namespaces/kube-system/services/https:dashboard-kubernetes-dashboard:https/proxy/#!/login

## Deploying trough helm
First we always need to update our dependencys
$ helm dependency update ./api/helm

If you want to create a new instance
```CLI
$ helm install --name pc-dev ./api/helm  --kubeconfig="api/helm/kubeconfig.yaml" --namespace=dev  --set settings.env=dev,settings.debug=1
$ helm install --name pc-stag ./api/helm --kubeconfig="api/helm/kubeconfig.yaml" --namespace=stag --set settings.env=stag,settings.debug=0
$ helm install --name pc-prod ./api/helm --kubeconfig="api/helm/kubeconfig.yaml" --namespace=prod --set settings.env=prod,settings.debug=0
```

Or update if you want to update an existing one
```CLI
$ helm upgrade pc-dev ./api/helm  --kubeconfig="api/helm/kubeconfig.yaml" --namespace=dev  --set settings.env=dev,settings.debug=1
$ helm upgrade pc-stag ./api/helm --kubeconfig="api/helm/kubeconfig.yaml" --namespace=stag --set settings.env=stag,settings.debug=0
$ helm upgrade pc-prod ./api/helm --kubeconfig="api/helm/kubeconfig.yaml" --namespace=prod --set settings.env=prod,settings.debug=0
```

Or del if you want to delete an existing  one
```CLI
$ helm del pc-dev  --purge --kubeconfig="api/helm/kubeconfig.yaml" 
$ helm del pc-stag --purge --kubeconfig="api/helm/kubeconfig.yaml" 
$ helm del pc-prod --purge --kubeconfig="api/helm/kubeconfig.yaml" 
```

Note that you can replace common ground with the namespace that you want to use (normally the name of your component).


## Making your app known on NLX
The proto component comes with an default NLX setup, if you made your own component however you might want to provide it trough the [NLX](https://www.nlx.io/) service. Fortunately the proto component comes with an nice setup for NLX integration.

First of all change the necessary lines in the [.env](.env) file, basically everything under the NLX setup tag. Keep in mind that you wil need to have your component available on an (sub)domain name (a simple IP wont sufice).

To force the re-generation of certificates simply delete the org.crt en org.key in the api/nlx-setup folder.


## Deploying trough common-ground.dev


## Setting up analytics and a help chat function
As a developer you might be intrested to know how your application documentation is used, so you can see which parts of your documentation are most read and which parts might need some additional love. You can measure this (and other user interactions) with google tag manager. Just add your google tag id to the .env file (replacing the default) under GOOGLE_TAG_MANAGER_ID. 

Have you seen our sweet support-chat on the documentation page? We didn't build that ourselves ;) We use a Hubspot chat for that, just head over to Hubspot, create an account and enter your Hubspot embed code in het .env file (replacing the default) under HUBSPOT_EMBED_CODE.

Would you like to use a different analytics or chat-tool? Just shoot us a [feature request](https://github.com/ConductionNL/commonground-component/issues/new?assignees=&labels=&template=feature_request.md&title=New Analytics or Chat provider)  
