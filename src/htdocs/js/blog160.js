function addEntry() {
	$.post("index.php?controller=Blog&action=AddEntry", {
		message : document.getElementById('blog_entry').value
	}, function(data) {
		json_result = eval("(" + data + ")");
		if (json_result.status == 'failed') {
			$("#error_entry").html(json_result.html);
		} else {
			$("#error_entry").html('');
			$("#entries").prepend(json_result.html);
		}
	})
}

function addComment(blogEntryId) {
	$.post("index.php?controller=Blog&action=AddComment", {
		message : document.getElementById('add_comment_'+blogEntryId).value,
		blog_entry_id : blogEntryId
	}, function(data) {
		json_result = eval("(" + data + ")");
		
		if (json_result.status == 'failed') {
			$("#comment_error_"+blogEntryId).html(json_result.html);
		} else {
			$("#comment_error_"+blogEntryId).html('');
			$("#comments_"+blogEntryId).prepend(json_result.html);
		}
	})
}