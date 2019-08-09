(function() {

	// Create Definition List Plugin
	tinymce.create('tinymce.plugins.gt3_definition_list', {
		init : function(ed, url) {
			ed.addButton('gt3_definition_list', {
				title : 'Definition List',
				icon : 'gt3_dl',
				onclick : function() {
					var selected_text = ed.selection.getContent();
					ed.selection.setContent('<dl class="gt3_dl"><dt>Title</dt><dd>Description</dd></dl>');
				}
			});
		},
		createControl : function(n, cm) {
			return null;
		}
	});
	tinymce.PluginManager.add('gt3_definition_list', tinymce.plugins.gt3_definition_list);

})();