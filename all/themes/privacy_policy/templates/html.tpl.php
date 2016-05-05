<?php
/**
 * @file
 * Default theme implementation to display the basic html structure of a single
 * Drupal page.
 *
 * Variables:
 * - $css: An array of CSS files for the current page.
 * - $language: (object) The language the site is being displayed in.
 *   $language->language contains its textual representation.
 *   $language->dir contains the language direction. It will either be 'ltr' or 'rtl'.
 * - $rdf_namespaces: All the RDF namespace prefixes used in the HTML document.
 * - $grddl_profile: A GRDDL profile allowing agents to extract the RDF data.
 * - $head_title: A modified version of the page title, for use in the TITLE
 *   tag.
 * - $head_title_array: (array) An associative array containing the string parts
 *   that were used to generate the $head_title variable, already prepared to be
 *   output as TITLE tag. The key/value pairs may contain one or more of the
 *   following, depending on conditions:
 *   - title: The title of the current page, if any.
 *   - name: The name of the site.
 *   - slogan: The slogan of the site, if any, and if there is no title.
 * - $head: Markup for the HEAD section (including meta tags, keyword tags, and
 *   so on).
 * - $styles: Style tags necessary to import all CSS files for the page.
 * - $scripts: Script tags necessary to load the JavaScript files and settings
 *   for the page.
 * - $page_top: Initial markup from any modules that have altered the
 *   page. This variable should always be output first, before all other dynamic
 *   content.
 * - $page: The rendered page content.
 * - $page_bottom: Final closing markup from any modules that have altered the
 *   page. This variable should always be output last, after all other dynamic
 *   content.
 * - $classes String of classes that can be used to style contextually through
 *   CSS.
 *
 * Custom Variables:
 * - $theme_base: (string) The path to the theme directory.
 *
 * @see template_preprocess()
 * @see template_preprocess_html()
 * @see template_process()
 *
 * @ingroup themeable
 */
?>
<!doctype html>
<html lang="<?php print $language->language; ?>">

<head profile="<?php print $grddl_profile; ?>">
  <?php print $head; ?>
  <meta name="viewport"
        content="width=device-width, initial-scale=1, maximum-scale=1"/>

  <title><?php print $head_title; ?></title>
  <!-- Inject the adobe tag manager script in the html head tag. -->
  <script type="text/javascript" src="//assets.adobedtm.com/7a8a98de0363fbed05b98da851d6b23866ffa7cc/satelliteLib-680156eb19277c7ad2206ff3fac1c250f6d6214c.js"></script>
  <?php print $styles; ?>
  <?php print $scripts; ?>

  <!--[if lt IE 9]>
  <script type="text/javascript"
          src="/<?= $theme_path ?>/js/libs/css_media_queries/css3-mediaqueries.js"></script>
  <script type="text/javascript"
          src="/<?= $theme_path ?>/js/libs/html5shiv/html5shiv-printshiv.js"></script>
  <![endif]-->

</head>

<body class="<?php print $classes; ?> " <?php print $attributes; ?>>
<?php
if (isset($page_top)) {
  print($page_top);
}
?>

<?php print $page; ?>

<?php
if (isset($page_bottom)) {
  print($page_bottom);
}
?>
</body>
</html>
