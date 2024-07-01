<?php defined("ABSPATH") || die("!");
function gov_language(){

	return [
		//general
		"comment" => "Comment", 
		"comment_label" => "Comment", 
		"view_all" => "View More",
		"keywords_text" => "Keywords", 
		"search_auto_label" => "Search",
		"search_imdb_label" => "IMDb: ",
		"search_release_label" => "Release: ",
		//latest series
		"latest_series_page_title" => "Latest Series",
		//latest episodes
		"latest_episodes_page_title" => "Latest Episodes",
		//bookmark
		"bookmark_head" => "You can save a list of movies/series here up to {{max}} titles. The list ordered based on the latest update date. The list of series is stored in your current browser.",
		"bookmark_no_item" => "YOU HAVE NO BOOKMARK, NOTHING TO SHOW",
		"delete" =>  "Delete",
		"bookmark_browser_not_supported" => "Sorry, your browser is not supported.\nUse Chrome / Firefox browser",
		"bookmark_max_bookmark_reached" => "Sorry, your maximum bookmark has been reached \nplease remove some bookmark item",
		//home slider
		"home_imdb" => "IMDb",
		"home_subheading" => "Just a faster and better place for watching online movies for free!",
		"home_latest_movies_label" => "Latest Movies",
		"home_latest_movies_recommended_tab_label" => "Recommended",
		"home_latest_movies_most_popular_tab_label" => "Most Popular",
		"home_latest_movies_latest_modified_tab_label" => "Last Modified",
		"home_latest_episodes_label" => "Latest Episodes",
		"home_latest_episodes_all_tab_label" => "All",
		//pagination 
		"pagination_first" => "&laquo;",
		"pagination_last" => "&raquo;",
		"pagination_prev" => "&lsaquo;",
		"pagination_next" => "&rsaquo;",
		
		//episode single page 
		"episode_select_server" => "Server", 
		"episode_page_turn_off_light" => "Turn Off Light", 
		"episode_page_turn_on_light" => "Turn On Light", 
		"episode_page_download_button" => "Download",
		"episode_page_download_server_label" => "Server",
		"episode_page_download_language_label" => "Language",
		"episode_page_download_quality_label" => "Quality",
		"episode_page_download_link_label" => "Link",

		//series single page
		"series_info_genres_label" => "Genre", 
		"series_info_network_label" => "Network", 
		"series_info_duration_label" => "Duration", 
		"series_info_status_label" => "Status",
		"series_info_released_label" => "Release", 
		"series_info_type_label" => "Type",
		"series_info_updated_on_label" => "Updated On", 
		"series_info_posted_on_label" => "Posted On", 
		"series_info_date_format" => "F j, Y", 
		"series_info_country_label" => "Country", 
		"series_info_quality_label" => "Quality", 
		"series_info_director_label" => "Director", 
		"series_info_actor_label" => "Stars", 
		"series_info_votes_label" => "votes", 
		"series_info_related_label" => "YOU MAY ALSO LIKE", 
		"series_bookmarked_by" => "Followed by {{count}} members", 
		"series_episode_list_label" => "Episodes {{post_title}}", 
		"series_episode_list_date_format" => "l M j, Y", 
		"series_episode_prefix" => "Episode {{episode_number}}", 

		//advanced search series
		"advanced_search_filter_label" => "Filter",
		"advanced_search_sortby_label" => "Sort By",
		"advanced_search_sortby_release_date_label" => "Release date",
		"advanced_search_sortby_most_viewed_label" => "Most viewed",
		"advanced_search_sortby_name_label" => "Name",
		"advanced_search_sortby_imdb_label" => "IMDb",
		"advanced_search_sortby_latest_label" => "Latest",
		"advanced_search_genre_label" => "Genre",
		"advanced_search_country_label" => "Country",
		"advanced_search_type_label" => "Type",
		"advanced_search_series_status_label" => "Status Series",
		"advanced_search_series_status_ongoing_label" => "Ongoing",
		"advanced_search_series_status_completed_label" => "Completed",
		"advanced_search_quality_label" => "Quality",
		"advanced_search_release_date_label" => "Release",
		"advanced_search_filter_button_label" => "Filter Movies",

		//footer 
		"footer_desc_text" => "<b>{{blog_name}} - {{blog_desc}}</b>, here you can <i>watch movies online</i> in high quality for free without annoying of advertising, just come and enjoy your <i>movies online</i>.",
		"footer_disclaimer" => "Disclaimer: copyrights and trademarks for the movies and tv series, and other promotional materials are held by their respective owners and their use is allowed under the fair use clause of the Copyright Law. All Series Videos are hosted on sharing website, and provided by 3rd parties not affiliated with this site or it's server.",
		"footer_copyright_text" => "Copyright © {{blogname}}.  All Rights Reserved.",

		//tooltip
		"tooltip_imdb" => "IMDb",
		"tooltip_watch_now_label" => "Watch Now!",
		
		//v4.2.0
		"advanced_search_movie_label" => "Movie",
		"advanced_search_series_label" => "Series",
		
		//v4.5.0
		"home_movie_thumbnail_label" => "Movie",
		"home_series_thumbnail_label" => "TV",
		"home_episode_thumbnail_label" => "EP",
		"episode_page_download_size_label" => "Size",
		"episode_page_download_download_label" => "Download",
		"gallery_title" => "Gallery {{title}}",
		"plyr_next" => "Next",
		"plyr_prev" => "Prev",
		"plyr_info" => "Info",
		"series_episode_season_episode" => "Season/Ep",
		"series_episode_season_group_label" => "Season {{season}}",
		"series_episode_season_no_group" => "Episode",
		"series_episode_season_min_label" => "S",
		"series_episode_episode_min_label" => "EP ",
		"widget_popular_weekly" => "Weekly",
		"widget_popular_monthly" => "Monthly",
		"widget_popular_alltime" => "All",
		"trailer_button" => "Trailer",

		//v4.5.2
		"bookmark_label" => "Bookmark",
		"bookmarked_label" => "Bookmarked",

		//v4.5.3
		"breadcrumb_home_label" => "Home",
		"breadcrumb_tv_series_label" => "TV Series",
		"breadcrumb_movies_label" => "Movies",
		"series_label" => "Series",
		"series_has_no_episode_text" => "-- NO EPISODES YET --",

	];
}