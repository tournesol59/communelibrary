import fetch from 'node-fetch';

async function getDvd() {
	try {
		const response = await fetch('https://127.0.0.1/ajaxpremiers/dvd.xml');
		
		if (!response.ok) {
			throw new Error('Error ! status: ${response.status}');
		}

		const result = await response.xml();
                
		var items = result.getElementsByTagName("item");

		return items[0].getElementsByTagName("title")[0].firstChild.nodeValue;

	} catch (err) {
		console.log(err);
	}
}


