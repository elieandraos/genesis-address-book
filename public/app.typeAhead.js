/*
 * Twitter type ahead configuration.
 */
function initTypeAhead()
{
	$(".search-bar").typeahead({
		//make typeahead search from the json returned from out controller search method
		source: function(query, process){
			return $.get(
				'/contacts/search',
				{ q : query},
				function(data){
					return process(data);
				}
			);
		},
		//make typeahead search names, email and phone in the list returned
		matcher: function (item) {
			var n = item.name; //name
			var p = item.phone; //phone
			var e = item.email; //email
			var q = this.query.trim().toLowerCase(); //search query
		    if (n.toLowerCase().indexOf(q) != -1 || p.toLowerCase().indexOf(q) != -1 || e.toLowerCase().indexOf(q) != -1 ) 
		        return true;
		},
		//custom display of search result.
		displayText: function (item) {
			html  = "<div class='tt-result'>";
			html += 	"<span class='result-name'>" + item.name + "</span>";
			html += 	"<span class='result-phone-email'>" + item.email + "-" + item.phone + "</span>";
			html += "</div>";

			return html;
		},
		//after the user selects, display the name only in the search bar and not all the html value of displayText
		afterSelect: function(item)
		{
			$('.search-bar').val( item.name );
			loadUrl("/contacts/" + item.id + "/show", "Contact Details", null);
		},
		//apparenlty highlighter() method converts the displayText() html to text, 
		//had to override that. https://github.com/bassjobsen/Bootstrap-3-Typeahead/issues/113
		highlighter: function(item) {
	        var query = this.query;
	        if(!query) {
	            return '<div> ' + item + '</div>';
	        }

	        var reEscQuery = query.replace(/[\-\[\]\/\{\}\(\)\*\+\?\.\\\^\$\|]/g, "\\$&");
	        var reQuery = new RegExp('(' + reEscQuery + ')', "gi");

	        var jElem = $('<div></div>').html(item);
	        var textNodes = $(jElem.find('*')).add(jElem).contents().filter(function () { return this.nodeType === 3; });
	        textNodes.replaceWith(function() {
	            return $(this).text().replace(reQuery, '<strong>$1</strong>')
	        });
	        return jElem.html();
    	}
	});
}
