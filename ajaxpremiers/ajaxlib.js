var xhr=getXMLHttpRequest();
/* la fonction handleHttpResponse est fournie plus loin dans cet article */
xhr.onreadystatechange = handleHttpResponse;
var url = "dvd.xml";
xhr.open("GET", url, true);
/* A preciser pour les requetes de type POST
xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
*/
xhr.send(null);
/* la methode GET est employee et il faut dans ce cas specifier null comme argument a la fonction send. Si la methode avait ete de type POST alors les variables auraient ete passees a la methode send de la facon suivante 
xhr.send("var1=value&var2=othervalue");
 * */
function handleHttpResponse() {
   if (xhr.readyState == 4 && xhr.status == 200) {
      /* xhr.responseXML permet dobtenir le fichier XML
       * xhr.responseText aurait retourne le fichier sous format texte */
	   response = cleanXML(xhr.responseXML.documentElement);
   }

