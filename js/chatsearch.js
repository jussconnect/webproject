$(function () {
  
    $('[data-toggle="tooltip"]').tooltip();
   
		$('.red-color').addClass('btn-danger');
		$('.green-color').addClass('btn-success');
		$('.yellow-color').addClass('btn-warning');
		
		//overflow add code and input blank
		var chat_height = $("#contact-list").height();
		if(chat_height>500)
		{
			$('#contact-list').css({
				'overflow-y': 'scroll',
				'height':'500px',
				'width':'100%'
			});
		}	
		
		$("#btn-chat").click(function(event){
		var input_f = $('#btn-input').val();
		if (input_f==''){
					$(".blank_e").addClass("has-error");
					event.preventDefault(); 
				}
				else
				{
					$(".blank_e").removeClass("has-error");
				}
		});
		
		//code for showing seen

				$('.seen').click(function(event){
					var post_id =  $(this).attr("id");
					$('#post_seen').modal('show');
					$('#message').html("<center><h4>Loading Please Wait...</h4><img src='img/loading.gif'></center>");
					$.ajax( {
						type: 'POST',
						url: 'ajaxdata.php',
						data: { post_id : post_id},

						success: function(data) {
							$('#message').html(data);
							}
						});
					});
   
    $('#fullscreen').on('click', function(event) {
        event.preventDefault();
        window.parent.location = "";
    });
    
    $('[data-command="toggle-search"]').on('click', function(event) {
        event.preventDefault();
        $(this).toggleClass('hide-search');
        
        if ($(this).hasClass('hide-search')) {        
            $('.c-search').closest('.row').slideUp(100);
        }else{   
            $('.c-search').closest('.row').slideDown(100);
        }
    })
    
    $('#contact-list').searchable({
        searchField: '#contact-list-search',
        selector: 'li',
        childSelector: '.col-xs-9',
        show: function( elem ) {
            elem.slideDown(100);
        },
        hide: function( elem ) {
            elem.slideUp( 100 );
        }
    })
});
/*! jQuery Searchable v1.0.0 by Stidges (http://twitter.com/stidges) | MIT */
!function(a){function b(b,c){this.$element=a(b),this.settings=a.extend({},d,c),this.init()}var c="searchable",d={selector:"tbody tr",childSelector:"td",searchField:"#search",striped:!1,oddRow:{},evenRow:{},hide:function(a){a.hide()},show:function(a){a.show()},searchType:"default"};b.prototype={init:function(){this.$searchElems=a(this.settings.selector,this.$element),this.$search=a(this.settings.searchField),this.matcherFunc=this.getMatcherFunction(this.settings.searchType),this.bindEvents(),this.updateStriping()},bindEvents:function(){var b=this;this.$search.on("change keyup",function(){b.search(a(this).val()),b.updateStriping()}),""!==this.$search.val()&&this.$search.trigger("change")},updateStriping:function(){var b=this,c=["oddRow","evenRow"],d=this.settings.selector+":visible";this.settings.striped&&a(d,this.$element).each(function(d,e){a(e).css(b.settings[c[d%2]])})},search:function(b){var c,d,e,f,g,h,i,j;if(0===a.trim(b).length)return this.$searchElems.css("display",""),void this.updateStriping();for(d=this.$searchElems.length,c=this.matcherFunc(b),i=0;d>i;i++){for(h=a(this.$searchElems[i]),e=h.find(this.settings.childSelector),f=e.length,g=!0,j=0;f>j;j++)if(c(a(e[j]).text())){g=!1;break}g===!0?this.settings.hide(h):this.settings.show(h)}},getMatcherFunction:function(a){return"fuzzy"===a?this.getFuzzyMatcher:"strict"===a?this.getStrictMatcher:this.getDefaultMatcher},getFuzzyMatcher:function(a){var b,c=a.split("").reduce(function(a,b){return a+"[^"+b+"]*"+b});return b=new RegExp(c,"gi"),function(a){return b.test(a)}},getStrictMatcher:function(b){return b=a.trim(b),function(a){return-1!==a.indexOf(b)}},getDefaultMatcher:function(b){return b=a.trim(b).toLowerCase(),function(a){return-1!==a.toLowerCase().indexOf(b)}}},a.fn[c]=function(d){return this.each(function(){a.data(this,"plugin_"+c)||a.data(this,"plugin_"+c,new b(this,d))})}}(jQuery,window,document);