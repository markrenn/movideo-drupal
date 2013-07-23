<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.6.1/jquery.min.js"></script>
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jqueryui/1.8.10/jquery-ui.min.js"></script>
<script type="text/javascript" src="http://static.movideo.com/js/movideo.min.latest.js"></script>
<script type="text/javascript" src="http://static.movideo.com/js-ui/movideo.ui.min.latest.js"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/json2/20121008/json2.js"></script>

<style type="text/css" media="all">@import url("http://local.movideo.test:8082/modules/system/system.base.css?mpzjg8");
@import url("/modules/system/system.menus.css?mpzjg8");
@import url("/modules/system/system.messages.css?mpzjg8");
@import url("/modules/system/system.theme.css?mpzjg8");</style>
<link rel="stylesheet" href="http://static.movideo.com/js-ui/css/movideo-ui-tree.css" type="text/css"/>
<style type="text/css">
    #search { width:300px; height:300px; float:left; margin:20px; display:inline; }
    #search-events { width:300px; float:right; margin:20px; display:inline; }
    #search-events pre { overflow:auto; width:280px; height:230px; }
    #player { float:left; width:504px; height:284px; margin-top:20px;}
</style>
<input type="hidden" value="" id="result-video-id" />
<input type="hidden" value="" id="result-video-data" />
<input type="hidden" value="video" name="videoType" id="result-video-type" />
<input type="hidden" value="<?php print $_GET['d']; ?>" name="videoType" id="result-video-key" />
<div id="search"></div>
<div id="player"></div>

<script>
    var mediaId;
    var mediaData;

    $('#search').tree({
        playlist:53582,
        appAlias:'TNPFlash',
        apiKey: 'movideoSingPressHold',
        searchTags: '["Singapore:topic=Business"]'
    });
    $('#player').player({
        appAlias:'TNPFlash',
        apiKey: 'movideoSingPressHold'
    });

    $('#search').bind({
      treemedia: handleEvent,
    });

    function handleEvent(event, data) {
        $('#player').player('play',{mediaId:data.id});
        mediaId = data.id;
        $('#result-video-id').val(mediaId);
				mediaData = JSON.stringify(data);
        $('#result-video-data').val(mediaData);
				$.each(data, function(key, element) {
						console.log('key: ' + key + '\n' + 'value: ' + element);
				});

    }

</script>
