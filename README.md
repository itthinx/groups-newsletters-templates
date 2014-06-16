groups-newsletters-templates
============================

Templates for Groups Newsletters

Theme templates for the <a href="http://www.itthinx.com/plugins/groups-newsletters/">Groups Newsletters</a> WordPress plugin.

This repository gathers theme-specific templates for Groups Newsletters.


Themes
------

If you would like to adjust the way things are displayed, you can use WordPress’ template system to customize how stories and newsletters are rendered. Depending on the theme, specific templates for stories and newsletters might be needed to display these correctly.

In your active theme, add a groups-newsletters folder. You can provide template files in that folder for the type of page you want to customize, for example:

`single-story.php` used to display a story
`taxonomy-newsletter.php` used to display a newsletter

Default templates, which can also be used to derive your own, are provided in the plugin’s templates folder.
Included are default `single-story.php` and `taxonomy-newsletter.php` templates.

An example Genesis child theme is available as <a href="https://github.com/itthinx/genesis-sample">Genesis Sample</a>.

Help with theme-specific templates
----------------------------------

If you need help with theme-specific templates and your theme is a free theme that can be downloaded, contact us on support at itthinx dot com with a link to where the theme can be obtained and ask for help on theme-specific templates for Groups Newsletters.

If your theme is a premium theme, do the same and provide access to a copy of the theme so we can test it. Make sure you are the theme author or the author has given consent to do this.

Once theme-specific templates have been created, these will be added to the <a href="https://github.com/itthinx/groups-newsletters-templates">Groups Newsletters Templates</a> repository on GitHub.


Contributing theme-specific templates
-------------------------------------

If you want to contribute theme-specific templates, fork the <a href="https://github.com/itthinx/groups-newsletters-templates">Groups Newsletters Templates</a> repository on GitHub, add a subfolder called <code>groups-newsletters</code> for the theme with the template files within it and issue a pull request.

If your theme is a free theme that can be downloaded, please add a readme.txt with a link to where it can be obtained.
If your theme is a premium theme, please include a link to where it can be obtained as well and provide access to a copy of the theme so your theme-specific templates can be tested.
For premium themes, make sure you are the theme author or the author has given consent to do this.

Pull requests for themes we can not test will not be granted.

Example: Assuming you're using a theme called Foobar that is in <code>wp-content/themes/foobar</code>, add the theme templates in <code>wp-content/themes/foobar/groups-newsletters</code>. To have it added to the repository, fork it, add the <code>foobar/groups-newsletters</code> folder to the root of the repository and issue a pull request.

You should end up with the following folder structure:

<pre>
groups-newsletters-templates (the root folder of this repository)
- foobar (a new subfolder for the theme)
  - groups-newsletters (a subfolder for the groups-newsletters templates)
    readme.txt
    single-story.php
    taxonomy-newsletter.php
</pre>
