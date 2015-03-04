<?php

/** @noinspection PhpMissingDocCommentInspection */
class GFontsDB {

	static public function InstallDB() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$table_name = $wpdb->prefix . 'gf_fontlist';
		$sql1 = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) not null,
			variant VARCHAR(255) not null,
			subsets VARCHAR(255) not null,
			used_in_posts int not null default 0,
			in_trash int not null default 0,
			total_used int not null default 0,
			gfont int not null default 1,
			installed int not null default 1,
			PRIMARY KEY  (id),
			KEY ix_gfl_installed (installed),
			KEY ix_gfl_gf (gfont),
			KEY ix_gfl_uip (used_in_posts)
		);";

		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql1);

		$table_name = $wpdb->prefix . 'gf_font_post';
		$sql2 = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			gf_fontlist_id int not null,
			wp_post_id int not null,
			PRIMARY KEY  (id),
			KEY ix_gfp_gfid (gf_fontlist_id)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql2);

		$table_name = $wpdb->prefix . 'gf_title_font_preset';
		$sql3 = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) not null,
			font VARCHAR(255) not null,
			title_color VARCHAR(255) not null,
			title_size VARCHAR(8) not null,
			title_bold TINYINT(1) not null default 0,
			title_italic TINYINT(1) not null default 0,
			title_underline TINYINT(1) not null default 0,
			title_shadow_vertical INT not null default 0,
			title_shadow_horizontal INT not null default 0,
			title_shadow_blur INT not null default 0,
			title_shadow_color VARCHAR(255) not null,
			is_default TINYINT not null default 0,
			uuid CHAR(36) null default null,
			KEY ix_gftp_def (is_default),
			UNIQUE KEY uq_gftp_uuid (uuid),
			PRIMARY KEY  (id)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql3);

		$table_name = $wpdb->prefix . 'gf_polls';
		// results_type
		// 0 - percentage
		// 1 - numbers
		// type
		// google charts
		// unique_mode
		// 0 - cookie based
		// 1 - ip based

		$sql4 = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			name VARCHAR(255) not null,
			title VARCHAR(1024) not null,
			type TINYINT NOT NULL DEFAULT 0,
			results_type TINYINT NOT NULL DEFAULT 0,
			voting_enabled TINYINT NOT NULL DEFAULT 1,
			voting_end_date DATETIME,
			client_mode TINYINT NOT NULL DEFAULT 1,
			button_title VARCHAR(64) NOT NULL DEFAULT 'Vote',
			KEY ix_gp_ve (voting_enabled),
			PRIMARY KEY  (id)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql4);

		$table_name = $wpdb->prefix . 'gf_polls_answers';
		$sql5 = "CREATE TABLE $table_name (
			id int NOT NULL AUTO_INCREMENT,
			answer VARCHAR(1024) not null,
			gf_polls_id INT NOT NULL,
			hits INT NOT NULL DEFAULT 0,
			KEY ix_gpa_gpi (gf_polls_id),
			PRIMARY KEY  (id)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql5);

		$table_name = $wpdb->prefix . 'gf_polls_ips';
		$sql6 = "CREATE TABLE $table_name (
			gf_polls_id INT NOT NULL,
			ip_address VARCHAR(16) NOT NULL,
			UNIQUE KEY uq_gpi_uq (gf_polls_id,ip_address)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql6);

		$table_name = $wpdb->prefix . 'gf_theme_layouts';
		$sql7 = "CREATE TABLE $table_name (
			id INT NOT NULL AUTO_INCREMENT,
			gtl_name VARCHAR(128) NOT NULL,
			gtl_layout VARCHAR(128) NOT NULL,
			gtl_settings LONGTEXT,
			uuid CHAR(36),
			PRIMARY KEY  (id),
			UNIQUE KEY uq_gtl_name (gtl_name),
			UNIQUE KEY uq_gtl_uuid (uuid)
		);";

		/** @noinspection PhpInternalEntityUsedInspection */
		dbDelta($sql7);
	}

	static public function UninstallDB() {
		/* @var $wpdb wpdb */
		global $wpdb;
		require_once( ABSPATH . 'wp-admin/includes/upgrade.php' );
		$table_name = $wpdb->prefix . 'gf_fontlist';
		$sql = "DROP TABLE " . $table_name . ";";
		$wpdb->query($sql);
		$table_name = $wpdb->prefix . 'gf_font_post';
		$sql = "DROP TABLE " . $table_name . ";";
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function InstallFont($fontname, $variant, $subsets, $noinstall = false) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT COUNT(*) FROM " . $wpdb->prefix . "gf_fontlist WHERE name = %s AND variant = %s";
		$sqlPrepared = $wpdb->prepare($sql, $fontname, $variant);
		$i = $wpdb->get_var($sqlPrepared);
		if ( $i == 0 && ! $noinstall ) {
				$sql = "INSERT INTO " . $wpdb->prefix . "gf_fontlist(name, variant, subsets, used_in_posts, gfont) VALUES(%s, %s, %s, 0, 1)";
				$sqlPrepared = $wpdb->prepare($sql, $fontname, $variant, $subsets);
				$wpdb->query($sqlPrepared);
			return 0;
		} else if ( 1 == $i ) {
			$sql = "UPDATE " . $wpdb->prefix . "gf_fontlist SET installed = 1, subsets = %s WHERE name = %s AND variant = %s";
			$sqlPrepared = $wpdb->prepare($sql, $subsets, $fontname, $variant);
			$wpdb->query($sqlPrepared);
			$sql = "SELECT used_in_posts FROM " . $wpdb->prefix . "gf_fontlist WHERE name = %s AND variant = %s";
			$sqlPrepared = $wpdb->prepare($sql, $fontname, $variant);
			$i = (int) $wpdb->get_var($sqlPrepared);
			return $i;
		}
		return 0;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UninstallFont($fontname, $variant) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE " . $wpdb->prefix . "gf_fontlist SET installed = 0 WHERE name = %s";
		$sqlPrepared = $wpdb->prepare($sql, $fontname, $variant);
		$wpdb->query($sqlPrepared);
		$sql = "SELECT used_in_posts FROM " . $wpdb->prefix . "gf_fontlist WHERE name = %s";
		$sqlPrepared = $wpdb->prepare($sql, $fontname, $variant);
		$i = (int) $wpdb->get_var($sqlPrepared);
		return $i;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetInstalledFonts($useParameter = 0, $nameFilter = '', $orderby = '', $direction = '') {
		/* @var $wpdb wpdb */
		global $wpdb;
		$nameFilter = '%' . $nameFilter . '%';
		$sql = null;
		if ($useParameter == 0) {
			$sql = "SELECT id, name, variant, used_in_posts, total_used, in_trash, subsets FROM " . $wpdb->prefix . "gf_fontlist WHERE installed = 1 AND gfont = 1 AND name like %s";
		} elseif ($useParameter == 1) {
			$sql = "SELECT id, name, variant, used_in_posts, total_used, in_trash, subsets FROM " . $wpdb->prefix . "gf_fontlist WHERE installed = 1 AND gfont = 1 AND used_in_posts > 0 AND name like %s";
		} elseif ($useParameter == 2) {
			$sql = "SELECT id, name, variant, used_in_posts, total_used, in_trash, subsets FROM " . $wpdb->prefix . "gf_fontlist WHERE installed = 1 AND gfont = 1 AND used_in_posts = 0 AND name like %s";
		}
		if ($orderby == '') {
			$orderby = 'name';
			$direction = 'ASC';
		}
		if ($orderby != '') {
			$sql .= ' ORDER BY ' . $orderby;
			if ($direction != '') {
				$sql .= ' ' . $direction;
			}
		}

		$sqlPrepared = $wpdb->prepare($sql, $nameFilter);
		return $wpdb->get_results($sqlPrepared);
	}

	static public function GetAllFonts() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT id, name, gfont FROM " . $wpdb->prefix . "gf_fontlist ORDER BY name ASC";
		return $wpdb->get_results($sql);
	}

	static public function GetInstalledFontsStats() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT 'used', count(*) as qty FROM " . $wpdb->prefix . "gf_fontlist where installed = 1 and used_in_posts > 0 and gfont = 1
		UNION ALL
		SELECT 'unused', count(*) as qty FROM " . $wpdb->prefix . "gf_fontlist where installed = 1 and used_in_posts = 0 and gfont = 1
		UNION ALL
		SELECT 'all', count(*) as qty FROM " . $wpdb->prefix . "gf_fontlist where installed = 1 and gfont = 1";
		return $wpdb->get_results($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UninstallFontById($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE " . $wpdb->prefix . "gf_fontlist SET installed = 0 WHERE installed = 1 AND id = %d";
		$sqlPrepared = $wpdb->prepare($sql, intval($id));
		$wpdb->query($sqlPrepared);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetFontsWithPosts($nameFilter = '', $orderby = '', $direction = '') {
		/* @var $wpdb wpdb */
		global $wpdb;
		$nameFilter = '%' . $nameFilter . '%';
		$sql = "SELECT id, name, variant, used_in_posts, in_trash, total_used, gfont FROM " . $wpdb->prefix . "gf_fontlist WHERE total_used > 0 AND name LIKE %s";
		if ($orderby == '') {
			$orderby = 'name';
			$direction = 'ASC';
		}
		if ($orderby != '') {
			$sql .= ' ORDER BY ' . $orderby;
			if ($direction != '') {
				$sql .= ' ' . $direction;
			}
		}
		$sqlPrepared = $wpdb->prepare($sql, $nameFilter);
		return $wpdb->get_results($sqlPrepared);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UninstallFontByIdCollection($arr) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$ids = array();
		foreach ($arr as $itm) {
			if (intval($itm) > 0) {
				$ids[] = intval($itm);
			}
		}

		if (count($ids) > 0) {
			$sql = sprintf("UPDATE " . $wpdb->prefix . "gf_fontlist SET installed = 0 WHERE installed = 1 AND id IN (%s)", implode(',', $ids));
			$wpdb->query($sql);
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UpdateFontUsedIn($id, $value, $gfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$gfontVal = $gfont ? 1 : 0;
		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = %d, gfont = %d, installed = %d WHERE id = %d";
		$installed = ($value > 0) ? 1 : 0;
		$sqlPrepared = $wpdb->prepare($sql, $value, $gfontVal, $installed, $id);
		$wpdb->query($sqlPrepared);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function InstallFontUsedIn($name, $value, $gfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$gfontVal = $gfont ? 1 : 0;
		$sql = "INSERT INTO {$wpdb->prefix}gf_fontlist(name, used_in_posts, variant, gfont, installed, subsets) VALUES(%s, %d, 'regular', %d, 1, '')";
		$sqlPrepared = $wpdb->prepare($sql, $name, $value, $gfontVal);
		$wpdb->query($sqlPrepared);
		return $wpdb->get_var($wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_fontlist WHERE name = %s", $name));
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UpdateFontUsedInTrash($id, $value, $gfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$gfontVal = $gfont ? 1 : 0;
		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET in_trash = %d, gfont = %d, installed = %d WHERE id = %d";
		$installed = ($value > 0) ? 1 : 0;
		$sqlPrepared = $wpdb->prepare($sql, $value, $gfontVal, $installed, $id);
		$wpdb->query($sqlPrepared);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function InstallFontUsedInTrash($name, $value, $gfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$gfontVal = $gfont ? 1 : 0;
		$sql = "INSERT INTO {$wpdb->prefix}gf_fontlist(name, in_trash, variant, gfont, installed, subsets) VALUES(%s, %d, 'regular', %d, 1, '')";
		$sqlPrepared = $wpdb->prepare($sql, $name, $value, $gfontVal);
		$wpdb->query($sqlPrepared);
		return $wpdb->get_var($wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_fontlist WHERE name = %s", $name));
	}

	static public function CalculateTotalUsed() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET total_used = used_in_posts + in_trash";
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function FontPostRelation($idpost, $idfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "INSERT INTO {$wpdb->prefix}gf_font_post(wp_post_id, gf_fontlist_id) VALUES(%d, %d)";
		$sqlPrepared = $wpdb->prepare($sql, $idpost, $idfont);
		$wpdb->query($sqlPrepared);
	}

	static public function RecalculateStats() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = 0, in_trash = 0, total_used = 0");
		$wpdb->query("TRUNCATE TABLE {$wpdb->prefix}gf_font_post");
		$serializedItems = get_option(GFontsEngine::PLUGIN_OPTION_FONT_DATABASE);
		$gfonts = array();
		$items = unserialize($serializedItems);
		foreach ($items as $itm) {
			$gfonts[] = $itm['name'];
		}
		$finish = false;
		$offset = 0;
		$usedInPosts = array();
		$usedInPostsInTrash = array();
		while (!$finish) {
			$args = array(
				'posts_per_page' => 200,
				'offset' => $offset * 200,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			if (count($posts) != 200) {
				$finish = true;
			}

			$regex = '/font-family:\s?\'?(.+?)\'?[;|\'|"]/i';
			$stats = array();

			foreach ($posts as $post) {
				$content = $post->post_content;

				if (preg_match_all($regex, $content, $matches)) {
					update_post_meta($post->ID, GFontsEngine::PLUGIN_META_NO_FONT, 0);
					$fonts = $matches[1];
					$usedFonts = array();
					foreach ($fonts as $font) {
						$font = str_replace("'", "", $font);
						$font = str_replace('"', "", $font);
						$fArray = explode(",", $font);
						$fname = ucwords(trim($fArray[0]));
						if (!in_array($fname, $usedFonts)) {

							$usedFonts[] = $fname;
							if ($post->post_status != 'trash') {
								if (isset($usedInPosts[$fname])) {
									$usedInPosts[$fname]++;
								} else {
									$usedInPosts[$fname] = 1;
								}
							} else {
								if (isset($usedInPostsInTrash[$fname])) {
									$usedInPostsInTrash[$fname]++;
								} else {
									$usedInPostsInTrash[$fname] = 1;
								}
							}
						}
					}

					$stats[$post->ID] = $usedFonts;
				} else {
					update_post_meta($post->ID, GFontsEngine::PLUGIN_META_NO_FONT, 1);
				}
			}

			$allFonts = GFontsDB::GetAllFonts();
			$fontIdByName = array();
			foreach ($allFonts as $font) {
				$fontIdByName[$font->name] = $font->id;
			}

			foreach ($usedInPosts as $name => $value) {
				if (isset($fontIdByName[$name])) {
					GFontsDB::UpdateFontUsedIn($fontIdByName[$name], $value, in_array($name, $gfonts));
				} else {
					$id = GFontsDB::InstallFontUsedIn($name, $value, in_array($name, $gfonts));
					$fontIdByName[$name] = $id;
				}
			}

			foreach ($usedInPostsInTrash as $name => $value) {
				if (isset($fontIdByName[$name])) {
					GFontsDB::UpdateFontUsedInTrash($fontIdByName[$name], $value, in_array($name, $gfonts));
				} else {
					GFontsDB::InstallFontUsedInTrash($name, $value, in_array($name, $gfonts));
				}
			}

			$allFonts = GFontsDB::GetAllFonts();
			$fontIdByName = array();
			foreach ($allFonts as $font) {
				$fontIdByName[$font->name] = $font->id;
			}

			foreach ($stats as $idpost => $fonts) {
				foreach ($fonts as $fntName) {
					$fntId = isset($fontIdByName[$fntName]) ? $fontIdByName[$fntName] : false;
					if ($fntId !== false) {
						GFontsDB::FontPostRelation($idpost, $fntId);
					}
				}
			}

			GFontsDB::CalculateTotalUsed();
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetFontsToReplace($exclude = '') {
		$fnts = GFontsDB::GetInstalledFonts();
		$avFonts = array();
		foreach ($fnts as $fnt) {
			$avFonts[] = $fnt->name;
		}

		$avFonts[] = 'Andale Mono';
		$avFonts[] = 'Arial';
		$avFonts[] = 'Arial Black';
		$avFonts[] = 'Book Antiqua';
		$avFonts[] = 'Comic Sans MS';
		$avFonts[] = 'Courier New';
		$avFonts[] = 'Georgia';
		$avFonts[] = 'Helvetica';
		$avFonts[] = 'Impact';
		$avFonts[] = 'Symbol';
		$avFonts[] = 'Tahoma';
		$avFonts[] = 'Terminal';
		$avFonts[] = 'Times New Roman';
		$avFonts[] = 'Trebuchet MS';
		$avFonts[] = 'Verdana';
		$avFonts[] = 'Webdings';
		$avFonts[] = 'Wingdings';

		if ($exclude != '') {
			$nAvFonts = array();
			foreach ($avFonts as $font) {
				if (ucwords($font) != ucwords($exclude)) {
					$nAvFonts[] = ucwords($font);
				}
			}
			$avFonts = $nAvFonts;
		}

		return $avFonts;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ReplaceFont($srcFontId, $dstFontname) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT wp_post_id FROM {$wpdb->prefix}gf_font_post WHERE gf_fontlist_id = %d";
		$sqlPrepared = $wpdb->prepare($sql, $srcFontId);
		$ids = $wpdb->get_col($sqlPrepared);

		$sql = $wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_fontlist WHERE name = %s", $dstFontname);
		$dstFontId = $wpdb->get_var($sql);

		if ($dstFontId === null) {
			$dstFontId = GFontsDB::InstallFontUsedIn($dstFontname, 0, 0);
		}

		$srcName = $wpdb->get_var($wpdb->prepare("SELECT name FROM {$wpdb->prefix}gf_fontlist WHERE id = %d", $srcFontId));

		$query = array(
			'posts_per_page' => 0,
			'offset' => 0,
			'category' => '',
			'orderby' => 'post_date',
			'order' => 'DESC',
			'exclude' => '',
			'meta_key' => '',
			'meta_value' => '',
			'post_type' => 'post',
			'post_mime_type' => '',
			'post_parent' => '',
			'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
			'suppress_filters' => true,
			'include' => implode(',', $ids)
		);
		$posts = get_posts($query);
		$postCount = 0;
		$trashCount = 0;
		foreach ($posts as $post) {
			$content = $post->post_content;
			$q = preg_replace('/font-family\s?:\s+\'?(' . $srcName . ')\'?([,|;|\'|"])/i', 'font-family: ' . $dstFontname . '$2', $content);
			$npost = array(
				'ID' => $post->ID,
				'post_content' => $q
			);

			wp_update_post($npost);
			$wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d AND gf_fontlist_id = %d", $post->ID, $srcFontId));
			GFontsDB::FontPostRelation($post->ID, $dstFontId);
			if ($post->post_status != 'trash') {
				$postCount++;
			} else {
				$trashCount++;
			}
		}

		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = 0, total_used = 0, in_trash = 0 WHERE id = %d";
		$sqlPrepared = $wpdb->prepare($sql, $srcFontId);
		$wpdb->query($sqlPrepared);
		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = used_in_posts + %d, total_used = total_used + %d WHERE name = %s";
		$sqlPrepared = $wpdb->prepare($sql, $postCount, $postCount, $dstFontname);
		$wpdb->query($sqlPrepared);
		$sql = "UPDATE {$wpdb->prefix}gf_fontlist SET in_trash = in_trash + %d, total_used = total_used + %d WHERE name = %s";
		$sqlPrepared = $wpdb->prepare($sql, $trashCount, $trashCount, $dstFontname);
		$wpdb->query($sqlPrepared);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetFontsFromContent($content) {
		$regex = '/font-family:\s?([\w\\\\\'\s\-]+)[;|\'|"|,]/i';
		$matches = array();
		if (preg_match_all($regex, $content, $matches)) {
			$fonts = $matches[1];
			$usedFonts = array();
			foreach ($fonts as $font) {
				$font = str_replace("'", "", $font);
				$font = str_replace('"', "", $font);
				$font = str_replace('\\', "", $font);
				$fArray = explode(",", $font);
				$fname = ucwords(trim($fArray[0]));
				if (!in_array($fname, $usedFonts)) {
					$usedFonts[] = $fname;
				}
			}
			return $usedFonts;
		} else {
			return null;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ContentSave($id, $oldContent, $newContent) {
		$oldFonts = GFontsDB::GetFontsFromContent($oldContent);
		$newFonts = GFontsDB::GetFontsFromContent($newContent);
		$df = GFontsDB::DetectFontChanges($oldFonts, $newFonts);
		foreach ($df['removed'] as $font) {
			GFontsDB::RemoveFontFromPost($font, $id);
		}

		foreach ($df['added'] as $font) {
			GFontsDB::AddFontToPost($font, $id);
		}

		if (count($newFonts) > 0) {
			update_post_meta($id, GFontsEngine::PLUGIN_META_NO_FONT, 0);
		} else {
			update_post_meta($id, GFontsEngine::PLUGIN_META_NO_FONT, 1);
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function DetectFontChanges($font1, $font2) {
		if ($font1 === null) {
			return array(
				'removed' => array(),
				'added' => is_array($font2) ? $font2 : array()
			);
		}
		if ($font2 === null) {
			return array(
				'removed' => is_array($font1) ? $font1 : array(),
				'added' => array()
			);
		}
		$d1 = array_diff($font1, $font2);
		$d2 = array_diff($font2, $font1);
		return array(
			'removed' => $d1,
			'added' => $d2
		);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function RemoveFontFromPost($font, $id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$fontId = GFontsDB::GetOrInstallFontByName($font, 0);
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d and gf_fontlist_id = %d", $id, $fontId);
		$wpdb->query($sql);
		$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = used_in_posts - 1, total_used = used_in_posts + in_trash WHERE id = %d", $fontId);
		$wpdb->query($sql);
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = 0, total_used = used_in_posts + in_trash WHERE used_in_posts < 0");
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function AddFontToPost($font, $id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$fontId = GFontsDB::GetOrInstallFontByName($font, 0);
		$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_font_post(wp_post_id, gf_fontlist_id) VALUES(%d, %d)", $id, $fontId);
		$wpdb->query($sql);
		$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = used_in_posts + 1, total_used = used_in_posts + in_trash WHERE id = %d", $fontId);
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetOrInstallFontByName($name, $gfont) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_fontlist WHERE name = %s", $name);
		$id = $wpdb->get_var($sql);
		if ($id == null) {
			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_fontlist(name, used_in_posts, gfont, installed, in_trash, total_used, subsets, variant) VALUES(%s, 0, %d, 1, 0, 0, '', 'regular')", $name, $gfont);
			$wpdb->query($sql);
			$id = $wpdb->get_var("SELECT LAST_INSERT_ID()");
			return $id;
		} else {
			return $id;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function PostDeleted($postid) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT gf_fontlist_id FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d", $postid);
		$ids = $wpdb->get_col($sql);
		foreach ($ids as $id) {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_fontlist SET in_trash = in_trash - 1, total_used = total_used - 1 WHERE id = %d", $id);
			$wpdb->query($sql);
		}
		$wpdb->query($wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d", $postid));
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET in_trash = 0 WHERE in_trash < 0");
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET total_used = 0 WHERE total_used < 0");
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function TrashedPost($postid) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT gf_fontlist_id FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d", $postid);
		$ids = $wpdb->get_col($sql);
		foreach ($ids as $id) {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = used_in_posts - 1, in_trash = in_trash + 1 WHERE id = %d", $id);
			$wpdb->query($sql);
		}
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = 0 WHERE used_in_posts < 0");
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UnTrashedPost($postid) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT gf_fontlist_id FROM {$wpdb->prefix}gf_font_post WHERE wp_post_id = %d", $postid);
		$ids = $wpdb->get_col($sql);
		foreach ($ids as $id) {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_fontlist SET used_in_posts = used_in_posts + 1, in_trash = in_trash - 1 WHERE id = %d", $id);
			$wpdb->query($sql);
		}
		$wpdb->query("UPDATE {$wpdb->prefix}gf_fontlist SET in_trash = 0 WHERE in_trash < 0");
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SaveTitlePreset($values) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE {$wpdb->prefix}gf_title_font_preset SET is_default = 0";
		$wpdb->query($sql);
		$sql = $wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_title_font_preset WHERE name = %s", $values['name']);
		$id = $wpdb->get_var($sql);
		$index = 2;
		$nName = $values['name'];
		while ($id != null) {
			$nName = $values['name'] . '-' . $index++;
			$sql = $wpdb->prepare("SELECT id FROM {$wpdb->prefix}gf_title_font_preset WHERE name = %s", $nName);
			$id = $wpdb->get_var($sql);
		}

		$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_title_font_preset(name, font, title_color, title_size, title_bold, title_italic, title_underline, title_shadow_vertical, title_shadow_horizontal, title_shadow_blur, title_shadow_color, is_default, uuid) VALUES(%s, %s, %s, %s, %d, %d, %d, %d, %d, %d, %s, %d, %s)", $nName, $values['font'], $values['title_color'], $values['title_size'], $values['title_bold'], $values['title_italic'], $values['title_underline'], $values['title_shadow_vertical'], $values['title_shadow_horizontal'], $values['title_shadow_blur'], $values['title_shadow_color'], $values['is_default'], self::uuid());
		$wpdb->query($sql);
	}

	static public function LoadTitlePresets() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}gf_title_font_preset ORDER BY name ASC";
		$results = $wpdb->get_results($sql);
		return $results;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function UpdateTitlePreset($values) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE {$wpdb->prefix}gf_title_font_preset SET is_default = 0";
		$wpdb->query($sql);
		if ($values['title_name'] != '') {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_title_font_preset SET font = %s, title_color = %s, title_size = %s, title_bold = %d, title_italic = %d, title_underline = %d, title_shadow_vertical = %d, title_shadow_horizontal = %d, title_shadow_blur = %d, title_shadow_color = %s, name = %s, is_default = %d where id = %d", $values['font'], $values['title_color'], $values['title_size'], $values['title_bold'], $values['title_italic'], $values['title_underline'], $values['title_shadow_vertical'], $values['title_shadow_horizontal'], $values['title_shadow_blur'], $values['title_shadow_color'], $values['title_name'], $values['is_default'], $values['id']);
		} else {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_title_font_preset SET font = %s, title_color = %s, title_size = %s, title_bold = %d, title_italic = %d, title_underline = %d, title_shadow_vertical = %d, title_shadow_horizontal = %d, title_shadow_blur = %d, title_shadow_color = %s, is_default = %d where id = %d", $values['font'], $values['title_color'], $values['title_size'], $values['title_bold'], $values['title_italic'], $values['title_underline'], $values['title_shadow_vertical'], $values['title_shadow_horizontal'], $values['title_shadow_blur'], $values['title_shadow_color'], $values['is_default'], $values['id']);
		}
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetPresetByName($name) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_title_font_preset WHERE name = %s", $name);
		$result = $wpdb->get_row($sql);
		return $result;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetPresetById($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_title_font_preset WHERE id = %d", $id);
		$result = $wpdb->get_row($sql);
		return $result;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function RemoveTitlePresetFromPost($post_id) {
		delete_post_meta($post_id, 'gf_custom_title_font');
		delete_post_meta($post_id, 'gf_custom_title_font_size');
		delete_post_meta($post_id, 'gf_custom_title_font_bold');
		delete_post_meta($post_id, 'gf_custom_title_font_italic');
		delete_post_meta($post_id, 'gf_custom_title_font_color');
		delete_post_meta($post_id, 'gf_custom_title_font_underline');
		delete_post_meta($post_id, 'gf_custom_title_font_shadow_vertical');
		delete_post_meta($post_id, 'gf_custom_title_font_shadow_horizontal');
		delete_post_meta($post_id, 'gf_custom_title_font_shadow_blur');
		delete_post_meta($post_id, 'gf_custom_title_font_shadow_color');
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SetTitlePresetForPost($post_id, $preset) {
		$ctf = $preset->font;
		$ctfs = $preset->title_size;
		$ctfb = $preset->title_bold;
		$ctfi = $preset->title_italic;
		$ctfc = $preset->title_color;
		$ctfu = $preset->title_underline;
		$ctfsv = $preset->title_shadow_vertical;
		$ctfsh = $preset->title_shadow_horizontal;
		$ctfsb = $preset->title_shadow_blur;
		$ctfsc = $preset->title_shadow_color;
		update_post_meta($post_id, 'gf_custom_title_font', $ctf);
		update_post_meta($post_id, 'gf_custom_title_font_size', $ctfs);
		update_post_meta($post_id, 'gf_custom_title_font_bold', $ctfb);
		update_post_meta($post_id, 'gf_custom_title_font_italic', $ctfi);
		update_post_meta($post_id, 'gf_custom_title_font_color', $ctfc);
		update_post_meta($post_id, 'gf_custom_title_font_underline', $ctfu);
		update_post_meta($post_id, 'gf_custom_title_font_shadow_vertical', $ctfsv);
		update_post_meta($post_id, 'gf_custom_title_font_shadow_horizontal', $ctfsh);
		update_post_meta($post_id, 'gf_custom_title_font_shadow_blur', $ctfsb);
		update_post_meta($post_id, 'gf_custom_title_font_shadow_color', $ctfsc);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function DeletePreset($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_title_font_preset WHERE id = %d", $id);
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SetTitlePresetForPosts($presetid, $withoutstyling = true) {
		$preset = self::GetPresetById($presetid);
		if (!$preset) {
			return 0;
		}

		$count = 0;
		$finish = false;
		$offset = 0;
		while (!$finish) {
			$args = array(
				'posts_per_page' => 200,
				'offset' => $offset * 200,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			if (count($posts) != 200) {
				$finish = true;
			}

			foreach ($posts as $post) {
				if ($withoutstyling) {
					$tf = get_post_meta($post->ID, 'gf_custom_title_font');
					if (!isset($tf[0])) {
						self::SetTitlePresetForPost($post->ID, $preset);
						$count++;
					}
				} else {
					self::SetTitlePresetForPost($post->ID, $preset);
					$count++;
				}
			}
		}

		return $count;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function RemoveTitlePresetFromPosts() {
		$count = 0;
		$finish = false;
		$offset = 0;
		while (!$finish) {
			$args = array(
				'posts_per_page' => 200,
				'offset' => $offset * 200,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			if (count($posts) != 200) {
				$finish = true;
			}

			foreach ($posts as $post) {
				$tf = get_post_meta($post->ID, 'gf_custom_title_font');
				if (isset($tf[0])) {
					self::RemoveTitlePresetFromPost($post->ID);
					$count++;
				}
			}
		}

		return $count;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ModifyCapitalizeUpperLowerTitles($action = 'capitalize') {
		$count = 0;
		$finish = false;
		$offset = 0;
		while (!$finish) {
			$args = array(
				'posts_per_page' => 200,
				'offset' => $offset * 200,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			if (count($posts) != 200) {
				$finish = true;
			}

			foreach ($posts as $post) {
				$title = $post->post_title;
				$go = true;
				switch ($action) {
					case 'capitalize' : $title = mb_convert_case($title, MB_CASE_TITLE);
						break;
					case 'lower' : $title = mb_strtolower($title);
						break;
					case 'upper' : $title = mb_strtoupper($title);
						break;
					case 'upfirst' : $title = ucfirst(mb_strtolower($title));
						break;
					default: $go = false;
						break;
				}
				if ($go) {
					$npost = array(
						'ID' => $post->ID,
						'post_title' => $title
					);
					wp_update_post($npost);
					$count++;
				}
			}
		}

		return $count;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ReplaceInTitles($src, $dst) {
		$count = 0;
		$finish = false;
		$offset = 0;
		while (!$finish) {
			$args = array(
				'posts_per_page' => 200,
				'offset' => $offset * 200,
				'category' => '',
				'orderby' => 'post_date',
				'order' => 'DESC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			if (count($posts) != 200) {
				$finish = true;
			}

			foreach ($posts as $post) {
				$title = $post->post_title;
				$ntitle = str_replace($src, $dst, $title);
				$go = ($ntitle != $title);
				if ($go) {
					$npost = array(
						'ID' => $post->ID,
						'post_title' => $ntitle
					);
					wp_update_post($npost);
					$count++;
				}
			}
		}

		return $count;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetPoll($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_polls WHERE id = %d", $id);
		$result = $wpdb->get_row($sql);
		return $result;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SavePoll($id, $name, $title, $type, $results_type, $voting_enabled, $voting_end_date, $client_mode, $button_title) {
		/* @var $wpdb wpdb */
		global $wpdb;
		if ($id == -1) {
			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_polls(name, title, type, results_type, voting_enabled, voting_end_date, client_mode, button_title) VALUES(%s, %s, %d, %d, %d, %s, %d, %s)", $name, $title, $type, $results_type, $voting_enabled, $voting_end_date, $client_mode, $button_title);
			$wpdb->query($sql);
			$id = $wpdb->get_var("SELECT LAST_INSERT_ID()");
			return $id;
		} else {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_polls SET name = %s, title = %s, type = %d, results_type = %d, voting_enabled = %d, voting_end_date = %s, client_mode = %d, button_title = %s WHERE id = %d", $name, $title, $type, $results_type, $voting_enabled, $voting_end_date, $client_mode, $button_title, $id);
			$wpdb->query($sql);
			return $id;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function DeletePoll($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_polls_ips WHERE gf_polls_id = %d", $id);
		$wpdb->query($sql);
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_polls_answers WHERE gf_polls_id = %d", $id);
		$wpdb->query($sql);
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_polls WHERE id = %d", $id);
		$wpdb->query($sql);
	}

	////////////////////////////////////////////////////
	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetAnswer($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_polls_answers WHERE id = %d", $id);
		$result = $wpdb->get_row($sql);
		return $result;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SaveAnswer($id, $answer, $hits, $gf_polls_id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		if ($id == -1) {
			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_polls_answers(answer, hits, gf_polls_id) VALUES(%s, %d, %d)", $answer, $hits, $gf_polls_id);
			$wpdb->query($sql);
			$id = $wpdb->get_var("SELECT LAST_INSERT_ID()");
			return $id;
		} else {
			$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_polls_answers SET answer = %s, hits = %d WHERE id = %d", $answer, $hits, $id);
			$wpdb->query($sql);
			return $id;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function DeleteAnswer($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_polls_answers WHERE id = %d", $id);
		$wpdb->query($sql);
	}

	static public function GetActivePolls() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}gf_polls WHERE voting_end_date > CURRENT_TIMESTAMP()";
		$results = $wpdb->get_results($sql);
		return $results;
	}

	static public function GetAllPolls() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}gf_polls ORDER BY name ASC";
		$results = $wpdb->get_results($sql);
		return $results;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetAnswersForPoll($poll_id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_polls_answers WHERE gf_polls_id = %d", $poll_id);
		$results = $wpdb->get_results($sql);
		return $results;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function AddPollHit($poll_id, $answer_id, $client_mode, $ip) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_polls_answers SET hits = hits + 1 WHERE id = %d", $answer_id);
		$wpdb->query($sql);
		if ($client_mode == 1) {
			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_polls_ips(gf_polls_id, ip_address) VALUES(%d, %s)", $poll_id, $ip);
			$wpdb->query($sql);
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function CheckVoteIpForPoll($poll_id, $ip) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_polls_ips WHERE gf_polls_id = %d AND ip_address = %s", $poll_id, $ip);
		return $wpdb->get_var($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SetTitlePresetDefault($preset_id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "UPDATE {$wpdb->prefix}gf_title_font_preset SET is_default = 0";
		$wpdb->query($sql);
		$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_title_font_preset SET is_default = 1 WHERE id = %d", $preset_id);
		$wpdb->query($sql);
	}

	static public function GetDefaultTitlePreset() {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = "SELECT * FROM {$wpdb->prefix}gf_title_font_preset WHERE is_default = 1 LIMIT 1";
		$result = $wpdb->get_row($sql);
		return $result;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ModifyCapitalizeUpperLowerTitlesLimited($action = 'capitalize', $start = 0, $limit = 15) {
		$count = 0;
		$finish = false;
		$offset = $start;
		while (!$finish) {
			$args = array(
				'posts_per_page' => $limit,
				'offset' => $offset,
				'category' => '',
				'orderby' => 'ID',
				'order' => 'ASC',
				'include' => '',
				'exclude' => '',
				'meta_key' => '',
				'meta_value' => '',
				'post_type' => 'post',
				'post_mime_type' => '',
				'post_parent' => '',
				'post_status' => array('publish', 'pending', 'draft', 'future', 'private', 'trash'),
				'suppress_filters' => true);
			$offset++;
			$posts = get_posts($args);
			$finish = true;


			foreach ($posts as $post) {
				$title = $post->post_title;
				$go = true;
				switch ($action) {
					case 'capitalize' : $title = mb_convert_case($title, MB_CASE_TITLE);
						break;
					case 'lower' : $title = mb_strtolower($title);
						break;
					case 'upper' : $title = mb_strtoupper($title);
						break;
					case 'upfirst' : $title = ucfirst(mb_strtolower($title));
						break;
					default: $go = false;
						break;
				}
				if ($go) {
					$npost = array(
						'ID' => $post->ID,
						'post_title' => $title
					);
					wp_update_post($npost);
					$count++;
				}
			}
		}

		return $count + $start;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function DeleteThemeLayout($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("DELETE FROM {$wpdb->prefix}gf_theme_layouts WHERE id = %d", $id);
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function SaveCurrentLayoutSettings($lname) {
		/* @var $wpdb wpdb */
		global $wpdb;
		if (trim($lname) == '') {
			$lname = 'Unknown';
		}
		/* @var $theme WP_Theme */
		$theme = wp_get_theme();
		$ltname = $lname;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_theme_layouts WHERE gtl_name = %s", $ltname);
		$i = $wpdb->get_var($sql);
		$index = 1;
		while ($i > 0) {
			$ltname = $lname . "_" . $index++;
			$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_theme_layouts WHERE gtl_name = %s", $ltname);
			$i = $wpdb->get_var($sql);
		}

		$thememods = get_theme_mods();
		/** @noinspection PhpUndefinedFieldInspection */
		$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_theme_layouts(gtl_name, gtl_layout, gtl_settings, uuid) VALUES(%s, %s, %s, %s)", $ltname, $theme->name, serialize($thememods), self::uuid());
		$wpdb->query($sql);
		return true;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ActivateLayoutSettings($id, &$name) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$theme = wp_get_theme();
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_theme_layouts WHERE id = %d", $id);
		$sett = $wpdb->get_row($sql);
		/** @noinspection PhpUndefinedFieldInspection */
		if ($sett->gtl_layout != $theme->name) {
			$name = $sett->gtl_layout;
			return false;
		} else {
			$mods = unserialize($sett->gtl_settings);
			foreach ($mods as $mod => $value) {
				set_theme_mod($mod, $value);
			}
			return true;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetThemeLayout($id) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_theme_layouts WHERE id = %d", $id);
		return $wpdb->get_row($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function RenameThemeLayout($id, $name) {
		/* @var $wpdb wpdb */
		global $wpdb;
		if (trim($name) == '') {
			$name = 'Unknown';
		}
		$ltname = $name;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_theme_layouts WHERE gtl_name = %s AND id != %d", $ltname, $id);
		$i = $wpdb->get_var($sql);
		$index = 1;
		while ($i > 0) {
			$ltname = $name . "_" . $index++;
			$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_theme_layouts WHERE gtl_name = %s AND id != %d", $ltname, $id);
			$i = $wpdb->get_var($sql);
		}
		$sql = $wpdb->prepare("UPDATE {$wpdb->prefix}gf_theme_layouts SET gtl_name = %s WHERE id = %d", $ltname, $id);
		$wpdb->query($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function uuid() {
		return sprintf('%04x%04x-%04x-%04x-%04x-%04x%04x%04x', mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0x0fff) | 0x4000, mt_rand(0, 0x3fff) | 0x8000, mt_rand(0, 0xffff), mt_rand(0, 0xffff), mt_rand(0, 0xffff));
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ExportTitlePresets($ids) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$nids = array();
		$sql = "SELECT * FROM {$wpdb->prefix}gf_title_font_preset WHERE id IN (";
		foreach ($ids as $id) {
			$nids[] = intval($id);
		}
		$sql .= implode(", ", $nids) . ")";
		$rows = $wpdb->get_results($sql);
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$xml .= '<powerpostsexport>';
		$xml .= "\n";
		if (count($rows) > 0) {
			$xml .= "<presets>\n";
			foreach ($rows as $preset) {
				$xml .= "<preset>\n";
				$xml .= "<name>" . $preset->name . "</name>\n";
				$xml .= "<font>" . $preset->font . "</font>\n";
				$xml .= "<title_color>" . $preset->title_color . "</title_color>\n";
				$xml .= "<title_size>" . $preset->title_size . "</title_size>\n";
				$xml .= "<title_bold>" . $preset->title_bold . "</title_bold>\n";
				$xml .= "<title_italic>" . $preset->title_italic . "</title_italic>\n";
				$xml .= "<title_underline>" . $preset->title_underline . "</title_underline>\n";
				$xml .= "<title_shadow_horizontal>" . $preset->title_shadow_horizontal . "</title_shadow_horizontal>\n";
				$xml .= "<title_shadow_vertical>" . $preset->title_shadow_vertical . "</title_shadow_vertical>\n";
				$xml .= "<title_shadow_blur>" . $preset->title_shadow_blur . "</title_shadow_blur>\n";
				$xml .= "<title_shadow_color>" . $preset->title_shadow_color . "</title_shadow_color>\n";
				$xml .= "<uuid>" . $preset->uuid . "</uuid>\n";
				$font = self::GetFontByName($preset->font);
				$googlefont = ($font != null) ? ($font->gfont == 1) : false;
				$xml .= "<gfont>" . ($googlefont ? 1 : 0) . "</gfont>\n";
				$xml .= "</preset>\n";
			}
			$xml .= "</presets>\n";
		}
		$xml .= '</powerpostsexport>';

		return $xml;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ExportThemeLayouts($ids) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$nids = array();
		$sql = "SELECT * FROM {$wpdb->prefix}gf_theme_layouts WHERE id IN (";
		foreach ($ids as $id) {
			$nids[] = intval($id);
		}
		$sql .= implode(", ", $nids) . ")";
		$rows = $wpdb->get_results($sql);
		$xml = "<?xml version=\"1.0\" encoding=\"UTF-8\"?>\n";
		$xml .= '<powerpostsexport>';
		$xml .= "\n";
		$xml .= '<layouts>';
		$xml .= "\n";
		$presets = array();
		foreach ($rows as $row) {
			$xml .= '<layout>';
			$xml .= "\n";
			$xml .= '<name>' . $row->gtl_name . '</name>';
			$xml .= "\n";
			$xml .= '<uuid>' . $row->uuid . '</uuid>';
			$xml .= "\n";
			$xml .= '<theme>' . $row->gtl_layout . '</theme>';
			$xml .= "\n";
			self::AddAttachmentsToLayoutExport($row->gtl_settings, $xml);
			$xml .= '<data>' . base64_encode($row->gtl_settings) . '</data>';
			$xml .= "\n";
			self::AddFontsUsedInLayoutExport($row->gtl_settings, $xml);
			$xml .= '</layout>';
			$xml .= "\n";
			$tb = unserialize($row->gtl_settings);
			if (isset($tb['gf_post_title_styling_override']) && $tb['gf_post_title_styling_override'] == true) {
				$presets[$tb['gf_post_title_styling_override_preset_uuid']] = 1;
			}
		}
		$xml .= '</layouts>';
		$xml .= "\n";
		if (count($presets) > 0) {
			$xml .= "<presets>\n";
			foreach ($presets as $uuid => $one) {
				$preset = self::GetTitlePresetForUuid($uuid);
				$xml .= "<preset>\n";
				$xml .= "<name>" . $preset->name . "</name>\n";
				$xml .= "<font>" . $preset->font . "</font>\n";
				$xml .= "<title_color>" . $preset->title_color . "</title_color>\n";
				$xml .= "<title_size>" . $preset->title_size . "</title_size>\n";
				$xml .= "<title_bold>" . $preset->title_bold . "</title_bold>\n";
				$xml .= "<title_italic>" . $preset->title_italic . "</title_italic>\n";
				$xml .= "<title_underline>" . $preset->title_underline . "</title_underline>\n";
				$xml .= "<title_shadow_horizontal>" . $preset->title_shadow_horizontal . "</title_shadow_horizontal>\n";
				$xml .= "<title_shadow_vertical>" . $preset->title_shadow_vertical . "</title_shadow_vertical>\n";
				$xml .= "<title_shadow_blur>" . $preset->title_shadow_blur . "</title_shadow_blur>\n";
				$xml .= "<title_shadow_color>" . $preset->title_shadow_color . "</title_shadow_color>\n";
				$xml .= "<uuid>" . $preset->uuid . "</uuid>\n";
				$font = self::GetFontByName($preset->font);
				$googlefont = ($font != null) ? ($font->gfont == 1) : false;
				$xml .= "<gfont>" . ($googlefont ? 1 : 0) . "</gfont>\n";
				$xml .= "</preset>\n";
			}
			$xml .= "</presets>\n";
		}
		$xml .= '</powerpostsexport>';

		return $xml;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetFontByName($font) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_fontlist WHERE name = %s", $font);
		$obj = $wpdb->get_row($sql);
		return $obj;
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function GetTitlePresetForUuid($uuid) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}gf_title_font_preset WHERE uuid = %s", $uuid);
		return $wpdb->get_row($sql);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ImportThemeLayout($layout) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_theme_layouts WHERE uuid = %s", $layout->uuid);
		$i = $wpdb->get_var($sql);
		if ($i > 0) {
			return false;
		} else {

			$impatts = array();
			$data = base64_decode($layout->data);

			if (isset($layout->attachments)) {
				foreach ($layout->attachments->attachment as $att) {
					$dir = wp_upload_dir();
					$path = $dir['path'];
					$filename = sprintf("%s/%s", $path, (string) $att->guid);
					if ((string) $att->ext != '') {
						$filename .= '.' . (string) $att->ext;
					}
					//if (!file_exists($filename)) {
						$f = fopen($filename, "w+");
						fwrite($f, base64_decode($att->data));
						fclose($f);
						$attachment = array(
							'guid' => $dir['url'] . '/' . basename($filename),
							'post_mime_type' => (string) $att->mimetype,
							'post_title' => preg_replace('/\.[^.]+$/', '', basename($filename)),
							'post_content' => '',
							'post_status' => 'inherit'
						);
						$attach_id = wp_insert_attachment($attachment, $filename, 0);
						require_once( ABSPATH . 'wp-admin/includes/image.php' );
						$attach_data = wp_generate_attachment_metadata($attach_id, $filename);
						wp_update_attachment_metadata($attach_id, $attach_data);
						$impatts[(string) $att->guid] = $attachment['guid'];
					//}
				}

				$dataarr = unserialize($data);
				self::PlaceAttachmentsInExportArray($dataarr, $impatts);
				$data = serialize($dataarr);
			}
			if (isset($layout->fonts)) {
				foreach($layout->fonts->font as $fnt) {
					self::InstallFont($fnt->name, $fnt->variant, $fnt->subsets);
				}
			}


			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_theme_layouts(gtl_name, gtl_layout, gtl_settings, uuid) VALUES(%s, %s, %s, %s)", $layout->name, $layout->theme, $data, $layout->uuid);
			$wpdb->query($sql);
			return true;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ImportPreset($preset) {
		/* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_title_font_preset WHERE uuid = %s", $preset->uuid);
		$i = $wpdb->get_var($sql);
		if ($i > 0) {
			return false;
		} else {
			$sql = $wpdb->prepare("INSERT INTO {$wpdb->prefix}gf_title_font_preset(name, font, title_color, title_size, title_bold, title_italic, title_underline, title_shadow_vertical, title_shadow_horizontal, title_shadow_blur, title_shadow_color, is_default, uuid) VALUES(%s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %s, %d, %s)", $preset->name, $preset->font, $preset->title_color, $preset->title_size, $preset->title_bold, $preset->title_italic, $preset->title_underline, $preset->title_shadow_vertical, $preset->title_shadow_horizontal, $preset->title_shadow_blur, $preset->shadow_color, 0, $preset->uuid);
			$wpdb->query($sql);
			self::GetOrInstallFontByName($preset->font, $preset->gfont);
			return true;
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function AddAttachmentsToLayoutExport(&$gtl_settings, &$xml) {
		$regex = '/' . str_replace('/', '\/', WP_CONTENT_URL) . '\/uploads\/[^"]+/im';
		$matches = array();
		$n = null;
		if (preg_match_all($regex, $gtl_settings, $matches)) {
			$n = array();
			foreach ($matches[0] as $url) {
				if (!isset($n[$url])) {
					$n[$url] = GFontsDB::uuid();
				}
			}
			/* @var $wpdb wpdb */
			global $wpdb;
			$attachments = array();
			foreach ($n as $url => $uuid) {
				$loc = str_replace(WP_CONTENT_URL, WP_CONTENT_DIR, $url);
				$sql = $wpdb->prepare("SELECT * FROM {$wpdb->prefix}posts WHERE guid = %s AND post_type = 'attachment' AND post_status = 'inherit'", $url);
				$att = $wpdb->get_row($sql);
				if ($att != null) {
					$pinfo = pathinfo($loc);
					$attachments[] = array(
						'guid' => $url,
						'uuid' => $uuid,
						'diskloc' => $loc,
						'mime_type' => $att->post_mime_type,
						'extension' => isset($pinfo['extension']) ? $pinfo['extension'] : null
					);
				}
			}
			if (count($attachments) > 0) {
				$xml .= "<attachments>\n";
				foreach ($attachments as $attachment) {
					$xml .= "<attachment>\n";
					$xml .= "<guid>" . $attachment['uuid'] . "</guid>\n";
					$xml .= "<mimetype>" . $attachment['mime_type'] . "</mimetype>\n";
					$xml .= "<ext>" . $attachment['extension'] . "</ext>\n";
					$xml .= "<data>" . base64_encode(file_get_contents($attachment['diskloc'])) . "</data>\n";
					$xml .= "</attachment>\n";
				}
				$xml .= "</attachments>\n";
			}
		}

		$gtl = unserialize($gtl_settings);
		if (is_array($n)) {
			self::ReplaceAttachmentsInExportArray($gtl, $n);
		}
		$gtl_settings = serialize($gtl);
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function ReplaceAttachmentsInExportArray(&$gtl_settings, $n) {
		foreach ($gtl_settings as $key => $value) {
			if (!is_array($value) && !is_object($value)) {
				if (isset($n[$value])) {
					$gtl_settings[$key] = "repl:[" . $n[$value] . "]";
				}
			} elseif (is_object($value)) {
				foreach ($value as $var => $val) {
					if (is_array($val) || is_object($val)) {
						self::ReplaceAttachmentsInExportArray($val, $n);
					} else {
						if (isset($n[$val])) {
							$value->$var = "repl:[" . $n[$val] . "]";
						}
					}
				}
			} else {
				self::ReplaceAttachmentsInExportArray($value, $n);
			}
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function PlaceAttachmentsInExportArray(&$gtl_settings, $n) {
		$patt = '/repl\:\[([a-z0-9\-]+)\]/i';
		foreach ($gtl_settings as $key => $value) {
			if (!is_array($value) && !is_object($value)) {
				if (preg_match($patt, $value, $mtcs)) {
					$gtl_settings[$key] = $n[$mtcs[1]];
				}
			} elseif (is_object($value)) {
				foreach ($value as $var => $val) {
					if (is_array($val) || is_object($val)) {
						self::PlaceAttachmentsInExportArray($val, $n);
					} else {
						if (preg_match($patt, $val, $mtcs)) {
							$value->$var = $n[$mtcs[1]];
						}
					}
				}
			} else {
				self::PlaceAttachmentsInExportArray($value, $n);
			}
		}
	}

	/** @noinspection PhpMissingDocCommentInspection */
	static public function AddFontsUsedInLayoutExport(&$gtl_settings_str, &$xml) {
		$gfonts = array();
		$gtl_settings = unserialize($gtl_settings_str);
		$f_gf_title_font = $gtl_settings['gf_title_font'];
		$f_gf_title_tagline_font = $gtl_settings['gf_title_tagline_font'];
		$f_gf_menu_font_name = $gtl_settings['gf_menu_font_name'];
		$f_gf_menu_font_hover_name = $gtl_settings['gf_menu_font_hover_name'];
		$f_gf_comment_font_name = $gtl_settings['gf_comment_font_name'];
		//
		$f1 = self::GetFontByName($f_gf_title_font);
		if ($f1) {
			$gfonts[$f_gf_title_font] = $f1;
		}

		$f2 = self::GetFontByName($f_gf_title_tagline_font);
		if ($f2) {
			$gfonts[$f_gf_title_tagline_font] = $f2;
		}

		$f3 = self::GetFontByName($f_gf_menu_font_name);
		if ($f3) {
			$gfonts[$f_gf_menu_font_name] = $f3;
		}

		$f4 = self::GetFontByName($f_gf_menu_font_hover_name);
		if ($f4) {
			$gfonts[$f_gf_menu_font_hover_name] = $f4;
		}

		$f5 = self::GetFontByName($f_gf_comment_font_name);
		if ($f5) {
			$gfonts[$f_gf_comment_font_name] = $f5;
		}

		foreach ($gtl_settings as $key => $value) {
			if (preg_match('/gf_custom_widget_.+_font_name/', $key)) {
				$fx = self::GetFontByName($value);
				if ($fx) {
					$gfonts[$value] = $fx;
				}
			}
		}

		if (count($gfonts) > 0) {
			$xml .= '<fonts>';
			$xml .= "\n";
			foreach($gfonts as $font=>$obj) {
				$xml .= "<font>\n";
				$xml .= "<name>" . $font . "</name>\n";
				$xml .= "<variant>" . $obj->variant . "</variant>\n";
				$xml .= "<subsets>" . $obj->subsets . "</subsets>\n";
				$xml .= "</font>\n";
			}
			$xml .= '</fonts>';
			$xml .= "\n";
		}
	}

    static public function CountFonts() {
	    /* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_fontlist WHERE installed = %d AND gfont = %d", 1, 1);
		return $wpdb->get_var($sql);
	}

    static public function CountPolls() {
	    /* @var $wpdb wpdb */
		global $wpdb;
		$sql = $wpdb->prepare("SELECT COUNT(*) FROM {$wpdb->prefix}gf_polls", 1, 1);
		return $wpdb->get_var($sql);
	}

}