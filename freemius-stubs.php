<?php
/**
 * Generated stub declarations for freemius.
 * @see https://freemius.com
 * @see https://github.com/mralaminahamed/phpstan-freemius-stubs
 */

/**
 * - Each instance of Freemius class represents a single plugin
 * install by a single user (the installer of the plugin).
 *
 * - Each website can only have one install of the same plugin.
 *
 * - Install entity is only created after a user connects his account with Freemius.
 *
 * Class Freemius_Abstract
 */
abstract class Freemius_Abstract
{
    #----------------------------------------------------------------------------------
    #region Identity
    #----------------------------------------------------------------------------------
    /**
     * Check if user has connected his account (opted-in).
     *
     * Note:
     *      If the user opted-in and opted-out on a later stage,
     *      this will still return true. If you want to check if the
     *      user is currently opted-in, use:
     *          `$fs->is_registered() && $fs->is_tracking_allowed()`
     *
     * @since 1.0.1
     *
     * @param bool $ignore_anonymous_state Since 2.5.1
     *
     * @return bool
     */
    abstract function is_registered($ignore_anonymous_state = \false);
    /**
     * Check if the user skipped connecting the account with Freemius.
     *
     * @since 1.0.7
     *
     * @return bool
     */
    abstract function is_anonymous();
    /**
     * Check if the user currently in activation mode.
     *
     * @since 1.0.7
     *
     * @return bool
     */
    abstract function is_activation_mode();
    #endregion
    #----------------------------------------------------------------------------------
    #region Module Type
    #----------------------------------------------------------------------------------
    /**
     * Checks if the plugin's type is "plugin". The other type is "theme".
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    abstract function is_plugin();
    /**
     * Checks if the module type is "theme". The other type is "plugin".
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    function is_theme()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Permissions
    #----------------------------------------------------------------------------------
    /**
     * Check if plugin must be WordPress.org compliant.
     *
     * @since 1.0.7
     *
     * @return bool
     */
    abstract function is_org_repo_compliant();
    /**
     * Check if plugin is allowed to install executable files.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function is_allowed_to_install()
    {
    }
    #endregion
    /**
     * Check if user in trial or in free plan (not paying).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return bool
     */
    function is_not_paying()
    {
    }
    /**
     * Check if the user has an activated and valid paid license on current plugin's install.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    abstract function is_paying();
    /**
     * Check if the user is paying or in trial.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    function is_paying_or_trial()
    {
    }
    /**
     * Check if user in a trial or have feature enabled license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @return bool
     */
    abstract function can_use_premium_code();
    #----------------------------------------------------------------------------------
    #region Premium Only
    #----------------------------------------------------------------------------------
    /**
     * All logic wrapped in methods with "__premium_only()" suffix will be only
     * included in the premium code.
     *
     * Example:
     *      if ( freemius()->is__premium_only() ) {
     *          ...
     *      }
     */
    /**
     * Returns true when running premium plugin code.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    function is__premium_only()
    {
    }
    /**
     * Check if the user has an activated and valid paid license on current plugin's install.
     *
     * @since 1.0.9
     *
     * @return bool
     *
     */
    function is_paying__premium_only()
    {
    }
    /**
     * All code wrapped in this statement will be only included in the premium code.
     *
     * @since  1.0.9
     *
     * @param string $plan  Plan name.
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    function is_plan__premium_only($plan, $exact = \false)
    {
    }
    /**
     * Check if plan matches active license' plan or active trial license' plan.
     *
     * All code wrapped in this statement will be only included in the premium code.
     *
     * @since  1.0.9
     *
     * @param string $plan  Plan name.
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    function is_plan_or_trial__premium_only($plan, $exact = \false)
    {
    }
    /**
     * Check if the user is paying or in trial.
     *
     * All code wrapped in this statement will be only included in the premium code.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    function is_paying_or_trial__premium_only()
    {
    }
    /**
     * Check if the user has an activated and valid paid license on current plugin's install.
     *
     * @since      1.0.4
     *
     * @return bool
     *
     * @deprecated Method name is confusing since it's not clear from the name the code will be removed.
     * @using      Alias to is_paying__premium_only()
     */
    function is_paying__fs__()
    {
    }
    /**
     * Check if user in a trial or have feature enabled license.
     *
     * All code wrapped in this statement will be only included in the premium code.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     * @return bool
     */
    function can_use_premium_code__premium_only()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Trial
    #----------------------------------------------------------------------------------
    /**
     * Check if the user in a trial.
     *
     * @since 1.0.3
     *
     * @return bool
     */
    abstract function is_trial();
    /**
     * Check if trial already utilized.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    abstract function is_trial_utilized();
    #endregion
    #----------------------------------------------------------------------------------
    #region Plans
    #----------------------------------------------------------------------------------
    /**
     * Check if the user is on the free plan of the product.
     *
     * @since 1.0.4
     *
     * @return bool
     */
    abstract function is_free_plan();
    /**
     * @since  1.0.2
     *
     * @param string $plan  Plan name.
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    abstract function is_plan($plan, $exact = \false);
    /**
     * Check if plan based on trial. If not in trial mode, should return false.
     *
     * @since  1.0.9
     *
     * @param string $plan  Plan name.
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    abstract function is_trial_plan($plan, $exact = \false);
    /**
     * Check if plan matches active license' plan or active trial license' plan.
     *
     * @since  1.0.9
     *
     * @param string $plan  Plan name.
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    function is_plan_or_trial($plan, $exact = \false)
    {
    }
    /**
     * Check if plugin has any paid plans.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    abstract function has_paid_plan();
    /**
     * Check if plugin has any free plan, or is it premium only.
     *
     * Note: If no plans configured, assume plugin is free.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    abstract function has_free_plan();
    /**
     * Check if plugin is premium only (no free plans).
     *
     * NOTE: is__premium_only() is very different method, don't get confused.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     * @return bool
     */
    abstract function is_only_premium();
    /**
     * Check if module has a premium code version.
     *
     * Serviceware module might be freemium without any
     * premium code version, where the paid features
     * are all part of the service.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @return bool
     */
    abstract function has_premium_version();
    /**
     * Check if module has any release on Freemius,
     * or all plugin's code is on WordPress.org (Serviceware).
     *
     * @return bool
     */
    function has_release_on_freemius()
    {
    }
    /**
     * Checks if it's a freemium plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     * @return bool
     */
    function is_freemium()
    {
    }
    /**
     * Check if module has only one plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @return bool
     */
    abstract function is_single_plan();
    #endregion
    /**
     * Check if running payments in sandbox mode.
     *
     * @since 1.0.4
     *
     * @return bool
     */
    abstract function is_payments_sandbox();
    /**
     * Check if running test vs. live plugin.
     *
     * @since 1.0.5
     *
     * @return bool
     */
    abstract function is_live();
    /**
     * Check if running premium plugin code.
     *
     * @since 1.0.5
     *
     * @return bool
     */
    abstract function is_premium();
    /**
     * Get upgrade URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @param string $period Billing cycle.
     *
     * @return string
     */
    abstract function get_upgrade_url($period = \WP_FS__PERIOD_ANNUALLY);
    /**
     * Check if Freemius was first added in a plugin update.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.5
     *
     * @return bool
     */
    function is_plugin_update()
    {
    }
    /**
     * Check if Freemius was part of the plugin when the user installed it first.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.5
     *
     * @return bool
     */
    abstract function is_plugin_new_install();
    #----------------------------------------------------------------------------------
    #region Marketing
    #----------------------------------------------------------------------------------
    /**
     * Check if current user purchased any other plugins before.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    abstract function has_purchased_before();
    /**
     * Check if current user classified as an agency.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    abstract function is_agency();
    /**
     * Check if current user classified as a developer.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    abstract function is_developer();
    /**
     * Check if current user classified as a business.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    abstract function is_business();
    #endregion
}
// "final class"
class Freemius extends \Freemius_Abstract
{
    /**
     * SDK Version
     *
     * @var string
     */
    public $version = \WP_FS__SDK_VERSION;
    #region Plugin Info
    /**
     * @since 1.0.1
     *
     * @var string
     */
    private $_slug;
    /**
     * @since 1.0.0
     *
     * @var string
     */
    private $_plugin_basename;
    /**
     * @since 2.2.1
     *
     * @var string
     */
    private $_premium_plugin_basename;
    /**
     * @since 1.0.0
     *
     * @var string
     */
    private $_free_plugin_basename;
    /**
     * @since 1.0.0
     *
     * @var string
     */
    private $_plugin_dir_path;
    /**
     * @since 1.0.0
     *
     * @var string
     */
    private $_plugin_dir_name;
    /**
     * @since 1.0.0
     *
     * @var string
     */
    private $_plugin_main_file_path;
    /**
     * @var string[]
     */
    private $_plugin_data;
    /**
     * @since 1.0.9
     *
     * @var string
     */
    private $_plugin_name;
    /**
     * @since 1.2.2
     *
     * @var string
     */
    private $_module_type;
    #endregion Plugin Info
    /**
     * @since 1.0.9
     *
     * @var bool If false, don't turn Freemius on.
     */
    private $_is_on;
    /**
     * @since 1.1.3
     *
     * @var bool If false, don't turn Freemius on.
     */
    private $_is_anonymous;
    /**
     * @since 1.0.9
     * @var bool If false, issues with connectivity to Freemius API.
     */
    private $_has_api_connection;
    /**
     * @since 1.0.9
     * @since 2.0.0 Default to true since we need the property during the instance construction, prior to the dynamic_init() execution.
     * @var bool Hints the SDK if plugin can support anonymous mode (if skip connect is visible).
     */
    private $_enable_anonymous = \true;
    /**
     * @since 1.1.7.5
     * @var bool Hints the SDK if plugin should run in anonymous mode (only adds feedback form).
     */
    private $_anonymous_mode;
    /**
     * @since 1.1.9
     * @var bool Hints the SDK if plugin have any free plans.
     */
    private $_is_premium_only;
    /**
     * @since 1.2.1.6
     * @var bool Hints the SDK if plugin have premium code version at all.
     */
    private $_has_premium_version;
    /**
     * @since 1.2.1.6
     * @var bool Hints the SDK if plugin should ignore pending mode by simulating a skip.
     */
    private $_ignore_pending_mode;
    /**
     * @since 1.0.8
     * @var bool Hints the SDK if the plugin has any paid plans.
     */
    private $_has_paid_plans;
    /**
     * @since 1.2.1.5
     * @var int Hints the SDK if the plugin offers a trial period. If negative, no trial, if zero - has a trial but
     *      without a specified period, if positive - the number of trial days.
     */
    private $_trial_days = -1;
    /**
     * @since 1.2.1.5
     * @var bool Hints the SDK if the trial requires a payment method or not.
     */
    private $_is_trial_require_payment = \false;
    /**
     * @since 1.0.7
     * @var bool Hints the SDK if the plugin is WordPress.org compliant.
     */
    private $_is_org_compliant;
    /**
     * @since 1.0.7
     * @var bool Hints the SDK if the plugin is has add-ons.
     */
    private $_has_addons;
    /**
     * @since 2.4.5
     * @var string Navigation type: 'menu' or 'tabs'.
     */
    private $_navigation;
    const NAVIGATION_MENU = 'menu';
    const NAVIGATION_TABS = 'tabs';
    /**
     * @since 1.1.6
     * @var string[]bool.
     */
    private $_permissions;
    /**
     * @var FS_Storage
     */
    private $_storage;
    /**
     * @since 1.2.2.7
     * @var FS_Cache_Manager
     */
    private $_cache;
    /**
     * @since 1.0.0
     *
     * @var FS_Logger
     */
    private $_logger;
    /**
     * @since 1.0.4
     *
     * @var FS_Plugin
     */
    private $_plugin = \false;
    /**
     * @since 1.0.4
     *
     * @var FS_Plugin|false
     */
    private $_parent_plugin = \false;
    /**
     * @since 1.1.1
     *
     * @var Freemius
     */
    private $_parent = \false;
    /**
     * @since 1.0.1
     *
     * @var FS_User
     */
    private $_user = \false;
    /**
     * @since 1.0.1
     *
     * @var FS_Site
     */
    private $_site = \false;
    /**
     * @since 1.0.1
     *
     * @var FS_Plugin_License
     */
    private $_license;
    /**
     * @since 1.0.2
     *
     * @var FS_Plugin_Plan[]
     */
    private $_plans = \false;
    /**
     * @var FS_Plugin_License[]
     * @since 1.0.5
     */
    private $_licenses = \false;
    /**
     * @since 1.0.1
     *
     * @var FS_Admin_Menu_Manager
     */
    private $_menu;
    /**
     * @var FS_Admin_Notices
     */
    private $_admin_notices;
    /**
     * @since 1.1.6
     *
     * @var FS_Admin_Notices
     */
    private static $_global_admin_notices;
    /**
     * @var FS_Logger
     * @since 1.0.0
     */
    private static $_static_logger;
    /**
     * @var FS_Options
     * @since 1.0.2
     */
    private static $_accounts;
    /**
     * @since 1.2.2
     *
     * @var number
     */
    private $_module_id;
    /**
     * @var Freemius[]
     */
    private static $_instances = array();
    /**
     * @since  1.2.3
     *
     * @var FS_Affiliate
     */
    private $affiliate = \null;
    /**
     * @since  1.2.3
     *
     * @var FS_AffiliateTerms
     */
    private $plugin_affiliate_terms = \null;
    /**
     * @since  1.2.3
     *
     * @var FS_AffiliateTerms
     */
    private $custom_affiliate_terms = \null;
    /**
     * @since  2.0.0
     *
     * @var bool
     */
    private $_is_multisite_integrated;
    /**
     * @since  2.0.0
     *
     * @var bool True if the current request is for a network admin screen and the plugin is network active.
     */
    private $_is_network_active;
    /**
     * @since  2.0.0
     *
     * @var int|null The original blog ID the plugin was loaded with.
     */
    private $_blog_id = \null;
    /**
     * @since  2.0.0
     *
     * @var int|null The current execution context. When true, run on network context. When int, run on the specified blog context.
     */
    private $_context_is_network_or_blog_id = \null;
    /**
     * @since  2.0.0
     *
     * @var string
     */
    private $_dynamically_added_top_level_page_hook_name = '';
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @var bool
     */
    private $is_whitelabeled;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.4.0
     *
     * @var bool
     */
    private $_is_bundle_license_auto_activation_enabled = \false;
    #region Uninstall Reasons IDs
    const REASON_NO_LONGER_NEEDED = 1;
    const REASON_FOUND_A_BETTER_PLUGIN = 2;
    const REASON_NEEDED_FOR_A_SHORT_PERIOD = 3;
    const REASON_BROKE_MY_SITE = 4;
    const REASON_SUDDENLY_STOPPED_WORKING = 5;
    const REASON_CANT_PAY_ANYMORE = 6;
    const REASON_OTHER = 7;
    const REASON_DIDNT_WORK = 8;
    const REASON_DONT_LIKE_TO_SHARE_MY_INFORMATION = 9;
    const REASON_COULDNT_MAKE_IT_WORK = 10;
    const REASON_GREAT_BUT_NEED_SPECIFIC_FEATURE = 11;
    const REASON_NOT_WORKING = 12;
    const REASON_NOT_WHAT_I_WAS_LOOKING_FOR = 13;
    const REASON_DIDNT_WORK_AS_EXPECTED = 14;
    const REASON_TEMPORARY_DEACTIVATION = 15;
    #endregion
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @var boolean|null
     */
    private $_use_external_pricing = \null;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.4.2
     *
     * @var string|null
     */
    private $_pricing_js_path = \null;
    const VERSION_MAX_CHARS = 16;
    const LANGUAGE_MAX_CHARS = 8;
    /* Ctor
    ------------------------------------------------------------------------------------------------------------------*/
    /**
     * Main singleton instance.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param number      $module_id
     * @param string|bool $slug
     * @param bool        $is_init Since 1.2.1 Is initiation sequence.
     */
    private function __construct($module_id, $slug = \false, $is_init = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     */
    private function maybe_adjust_storage()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param array $options
     * @param bool  $is_network_admin
     */
    private function adjust_storage($options, $is_network_admin)
    {
    }
    /**
     * Checks whether this module has a settings menu.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    function has_settings_menu()
    {
    }
    /**
     * If `true` the opt-in should be shown as a modal dialog box on the themes.php page. WordPress.org themes guidelines prohibit from redirecting the user from the themes.php page after activating a theme.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.5
     *
     * @return bool
     */
    function show_opt_in_on_themes_page()
    {
    }
    /**
     * If `true` the opt-in should be shown on the product's main setting page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.5
     *
     * @return bool
     *
     * @uses show_opt_in_on_themes_page();
     */
    function show_opt_in_on_setting_page()
    {
    }
    /**
     * If `true` the settings should be shown using tabs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.5
     *
     * @return bool
     */
    function show_settings_with_tabs()
    {
    }
    /**
     * Check if the context module is free wp.org theme.
     *
     * This method is helpful because:
     *      1. wp.org themes are limited to a single submenu item,
     *         and sub-submenu items are most likely not allowed (never verified).
     *      2. wp.org themes are not allowed to redirect the user
     *         after the theme activation, therefore, the agreed UX
     *         is showing the opt-in as a modal dialog box after
     *         activation (approved by @otto42, @emiluzelac, @greenshady, @grapplerulrich).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    function is_free_wp_org_theme()
    {
    }
    /**
     * Checks whether this a submenu item is visible.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.6
     * @since  1.2.2.7 Even if the menu item was specified to be hidden, when it is the context page, then show the submenu item so the user will have the right context page.
     *
     * @param string $slug
     * @param bool   $is_tabs_visibility_check This is used to decide if the associated tab should be shown or hidden.
     *
     * @return bool
     */
    function is_submenu_item_visible($slug, $is_tabs_visibility_check = \false)
    {
    }
    /**
     * Check if a Freemius page should be accessible via the UI.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param string $slug
     *
     * @return bool
     */
    function is_page_visible($slug)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _version_updates_handler()
    {
    }
    #--------------------------------------------------------------------------------
    #region Data Migration on SDK Update
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.5
     *
     * @param string $sdk_prev_version
     * @param string $sdk_version
     */
    function _sdk_version_update($sdk_prev_version, $sdk_version)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param \FS_Storage   $storage
     * @param bool|int|null $blog_id
     */
    private static function migrate_install_plan_to_plan_id(\FS_Storage $storage, $blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param string $plugin_prev_version
     * @param string $plugin_version
     */
    function _after_version_update($plugin_prev_version, $plugin_version)
    {
    }
    /**
     * A special migration logic for the $_accounts, executed for all the plugins in the system:
     *  - Moves some data to the network level storage.
     *  - If the plugin's connection was skipped for all sites, set the plugin as if it was network skipped.
     *  - If the plugin's connection was ignored for all sites, don't do anything in terms of the network connection.
     *  - If the plugin was connected to all sites by the same super-admin, set the plugin as if was network opted-in for all sites.
     *  - If there's at least one site that was connected by a super-admin, find the "main super-admin" (the one that installed the majority of the plugin installs) and set the plugin as if was network activated with the main super-admin, set all the sites that were skipped or opted-in with a different user to delegated mode. Then, prompt the currently logged super-admin to choose what to do with the ignored sites.
     *  - If there are any sites in the network which the connection decision was not yet taken for, set this plugin into network activation mode so a super-admin can choose what to do with the rest of the sites.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private static function migrate_accounts_to_network()
    {
    }
    /**
     * Set a module into network upgrade mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_Storage $storage
     *
     * @return bool
     */
    private static function set_network_upgrade_mode(\FS_Storage $storage)
    {
    }
    /**
     * Will return true after upgrading to the SDK with the network level integration,
     * when the super-admin involvement is required regarding the rest of the sites.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    function is_network_upgrade_mode()
    {
    }
    /**
     * Clear flag after the upgrade mode completion.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool True if network activation was on and now completed.
     */
    private function network_upgrade_mode_completed()
    {
    }
    #endregion
    /**
     * This action is connected to the 'plugins_loaded' hook and helps to determine
     * if this is a new plugin installation or a plugin update.
     *
     * There are 3 different use-cases:
     *    1) New plugin installation right with Freemius:
     *       1.1 _activate_plugin_event_hook() will be executed first
     *       1.2 Since $this->_storage->is_plugin_new_install is not set,
     *           and $this->_storage->plugin_last_version is not set,
     *           $this->_storage->is_plugin_new_install will be set to TRUE.
     *       1.3 When _plugins_loaded() will be executed, $this->_storage->is_plugin_new_install will
     *           be already set to TRUE.
     *
     *    2) Plugin update, didn't have Freemius before, and now have the SDK:
     *       2.1 _activate_plugin_event_hook() will not be executed, because
     *           the activation hook do NOT fires on updates since WP 3.1.
     *       2.2 When _plugins_loaded() will be executed, $this->_storage->is_plugin_new_install will
     *           be empty, therefore, it will be set to FALSE.
     *
     *    3) Plugin update, had Freemius in prev version as well:
     *       3.1 _version_updates_handler() will be executed 1st, since FS was installed
     *           before, $this->_storage->plugin_last_version will NOT be empty,
     *           therefore, $this->_storage->is_plugin_new_install will be set to FALSE.
     *       3.2 When _plugins_loaded() will be executed, $this->_storage->is_plugin_new_install is
     *           already set, therefore, it will not be modified.
     *
     *    Use-case #3 is backward compatible, #3.1 will be executed since 1.0.9.
     *
     * NOTE:
     *    The only fallback of this mechanism is if an admin updates a plugin based on use-case #2,
     *    and then, the next immediate PageView is the plugin's main settings page, it will not
     *    show the opt-in right away. The reason it will happen is because Freemius execution
     *    will be turned off till the plugin is fully loaded at least once
     *    (till $this->_storage->was_plugin_loaded is TRUE).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     */
    function _plugins_loaded()
    {
    }
    function _run_garbage_collector()
    {
    }
    /**
     * Opens the support forum subemenu item in a new browser page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.4
     */
    static function _open_support_forum_in_new_page()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function register_constructor_hooks()
    {
    }
    /**
     * Register the required hooks right after the settings parse is completed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     */
    private function register_after_settings_parse_hooks()
    {
    }
    /**
     * Makes Freemius-related updates unavailable on the "Add Plugins" admin page (/plugin-install.php) so that
     * they won't interfere with the .org plugins' functionalities on that page (e.g. updating of a .org plugin).
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.2.3
     *
     * @param object      $updates
     * @param string|null $transient
     *
     * @return object
     */
    static function _remove_fs_updates_from_plugin_install_page($updates, $transient = \null)
    {
    }
    /**
     * Prepends the `fs_allow_updater_and_dialog` param to the plugin information URLs to tell the SDK to handle
     * the information that is shown on the plugin details dialog that is shown when the relevant link is clicked.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.2.3
     *
     * @return void
     */
    static function _prepend_fs_allow_updater_and_dialog_flag_url_param()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     */
    static function _maybe_add_beta_label_styles()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     */
    static function _maybe_add_beta_label_to_plugins_and_handle_confirmation()
    {
    }
    /**
     * Keeping the uninstall hook registered for free or premium plugin version may result to a fatal error that
     * could happen when a user tries to uninstall either version while one of them is still active. Uninstalling a
     * plugin will trigger inclusion of the free or premium version and if one of them is active during the
     * uninstallation, a fatal error may occur in case the plugin's class or functions are already defined.
     *
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.2.0
     */
    private function unregister_uninstall_hook()
    {
    }
    /**
     * @since 1.2.0 Invalidate module's main file cache, otherwise, FS_Plugin_Updater will not fetch updates.
     *
     * @param bool $store_prev_path
     */
    private function clear_module_main_file_cache($store_prev_path = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     */
    function _hook_action_links_and_register_account_hooks()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _register_account_hooks()
    {
    }
    /**
     * Leverage backtrace to find caller plugin file path.
     *
     * @param bool   $is_init   Is initiation sequence.
     * @param string $main_file Since 2.5.0 expects the module's main file path to potentially purge the cached path.
     *
     * @return string
     * @since  1.0.6
     *
     * @author Vova Feldman (@svovaf)
     */
    private function _find_caller_plugin_file($is_init = \false, $main_file = '')
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @param string $path
     *
     * @return string
     */
    private function get_relative_path($path)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @param string      $path
     * @param string|bool $module_type
     *
     * @return string
     */
    private function get_absolute_path($path, $module_type = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @param string|bool $module_type
     *
     * @return string
     */
    private function get_module_root_dir_path($module_type = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param number $module_id
     * @param string $slug
     *
     * @return string Since 2.5.0 return the module's main file path.
     *
     * @since  1.2.2
     */
    private function store_id_slug_type_path_map($module_id, $slug)
    {
    }
    /**
     * Identifies the caller type: plugin or theme.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.3 Find the earliest module in the call stack that calls to the SDK. This fix is for cases when
     *         add-ons are relying on loading the SDK from the parent module, and also allows themes including the
     *         SDK an internal file instead of directly from functions.php.
     * @since  1.2.1.7 Knows how to handle cases when an add-on includes the parent module logic.
     *
     * @param number $module_id @since 2.5.0
     */
    private function get_caller_main_file_and_type($module_id)
    {
    }
    #----------------------------------------------------------------------------------
    #region Deactivation Feedback Form
    #----------------------------------------------------------------------------------
    /**
     * Displays a confirmation and feedback dialog box when the user clicks on the "Deactivate" link on the plugins
     * page.
     *
     * @author Vova Feldman (@svovaf)
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.1.2
     */
    function _add_deactivation_feedback_dialog_box()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.1.2
     *
     * @param string $user_type
     *
     * @return array The uninstall reasons for the specified user type.
     */
    function _get_uninstall_reasons($user_type = 'long-term')
    {
    }
    /**
     * Called after the user has submitted his reason for deactivating the plugin.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.2
     */
    function _submit_uninstall_reason_action()
    {
    }
    #--------------------------------------------------------------------------------
    #region Deactivation Feedback Snoozing
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.4.3
     *
     * @param int $period
     *
     * @return bool True if the value was set, false otherwise.
     */
    private static function snooze_deactivation_form($period)
    {
    }
    /**
     * Check if deactivation feedback form is snoozed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.3
     *
     * @return bool
     */
    static function is_deactivation_snoozed()
    {
    }
    /**
     * Reset deactivation snoozing. When `$period` is `0` will stop deactivation snoozing by deleting the transients. Otherwise, will set the transients for the selected period.
     *
     * @param int $period Period in seconds.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.3
     */
    private static function reset_deactivation_snoozing($period = 0)
    {
    }
    /**
     * The deactivation snooze expiration UNIX timestamp (in sec).
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.3
     *
     * @return int
     */
    static function deactivation_snooze_expires_at()
    {
    }
    #endregion
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.4
     */
    function cancel_subscription_or_trial_ajax_action()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.4
     *
     * @param number $plugin_id
     *
     * @return object
     */
    private function cancel_subscription_or_trial($plugin_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.0.2
     */
    function _delete_theme_update_data_action()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Instance
    #----------------------------------------------------------------------------------
    /**
     * Main singleton instance.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param  number      $module_id
     * @param  string|bool $slug
     * @param  bool        $is_init Is initiation sequence.
     *
     * @return Freemius|false
     */
    static function instance($module_id, $slug = \false, $is_init = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number $addon_id
     *
     * @return bool
     */
    private static function has_instance($addon_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @param  string|number $id_or_slug
     * @param  string        $module_type
     *
     * @return number|false
     */
    private static function get_module_id($id_or_slug, $module_type = \WP_FS__MODULE_TYPE_PLUGIN)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number $id
     *
     * @return false|Freemius
     */
    static function get_instance_by_id($id)
    {
    }
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param string $plugin_file
     * @param string $module_type
     *
     * @return false|Freemius
     */
    static function get_instance_by_file($plugin_file, $module_type = \WP_FS__MODULE_TYPE_PLUGIN)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return false|Freemius
     */
    function get_parent_instance()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param  string|number $id_or_slug
     *
     * @return false|Freemius
     */
    function get_addon_instance($id_or_slug)
    {
    }
    /**
     * @return Freemius[]
     */
    static function _get_all_instances()
    {
    }
    #endregion ------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function is_parent_plugin_installed()
    {
    }
    /**
     * Check if add-on parent plugin in activation mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function is_parent_in_activation()
    {
    }
    /**
     * Is plugin in activation mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param bool $and_on
     *
     * @return bool
     */
    function is_activation_mode($and_on = \true)
    {
    }
    /**
     * Is plugin in activation mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param bool $and_on
     *
     * @return bool
     */
    function is_site_activation_mode($and_on = \true)
    {
    }
    /**
     * Checks if the SDK in network activation mode.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param bool $and_on
     *
     * @return bool
     */
    private function is_network_activation_mode($and_on = \true)
    {
    }
    /**
     * Check if current page is the opt-in/pending-activation page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @return bool
     */
    function is_activation_page()
    {
    }
    /**
     * Check if URL path's are matching and that all querystring
     * arguments of the $sub_url exist in the $url with the same values.
     *
     * WARNING:
     *  1. This method doesn't check if the sub/domain are matching.
     *  2. Ignore case sensitivity.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param string $sub_url
     * @param string $url If argument is not set, check if the sub_url matching the current's page URL.
     *
     * @return bool
     */
    private function is_matching_url($sub_url, $url = '')
    {
    }
    /**
     * Get the basenames of all active plugins for specific blog. Including network activated plugins.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return string[]
     */
    private static function get_active_plugins_basenames($blog_id = 0)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param int $blog_id
     *
     * @return array
     */
    static function get_active_plugins_directories_map($blog_id = 0)
    {
    }
    /**
     * Get collection of all active plugins. Including network activated plugins.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param int $blog_id Since 2.0.0
     *
     * @return array[string]array
     */
    private static function get_active_plugins($blog_id = 0)
    {
    }
    /**
     * Get collection of all site active plugins for a specified blog.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return array[string]array
     */
    private static function get_site_active_plugins($blog_id = 0)
    {
    }
    /**
     * Get collection of all plugins with their activation status for a specified blog.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @param int $blog_id Since 2.0.0
     *
     * @return array Key is the plugin file path and the value is an array of the plugin data.
     */
    private static function get_all_plugins($blog_id = 0)
    {
    }
    /**
     * Get collection of all plugins and if they are network level activated.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return array Key is the plugin basename and the value is an array of the plugin data.
     */
    private static function get_network_plugins()
    {
    }
    /**
     * Cached result of get_site_transient( 'update_plugins' )
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @var object
     */
    private static $_plugins_info;
    /**
     * Helper function to get specified plugin's slug.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @param $basename
     *
     * @return string
     */
    private static function get_plugin_slug($basename)
    {
    }
    private static $_statics_loaded = \false;
    /**
     * Load static resources.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    private static function _load_required_static()
    {
    }
    #--------------------------------------------------------------------------------
    #region Clone
    #--------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param bool $only_if_manual_resolution_is_not_hidden
     *
     * @return bool
     */
    private function is_unresolved_clone($only_if_manual_resolution_is_not_hidden = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param bool $only_if_manual_resolution_is_not_hidden
     */
    function is_clone($only_if_manual_resolution_is_not_hidden = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *        
     * @param int|null $blog_id
     * @param bool     $strip_protocol
     * @param bool     $add_trailing_slash
     *
     * @return string
     */
    static function get_unfiltered_site_url($blog_id = \null, $strip_protocol = \false, $add_trailing_slash = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.6.0
     *
     * @param int|null $blog_id
     *
     * @return string
     */
    private static function get_site_url_from_wp_option($blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param number $site_id
     */
    function fetch_install_by_id($site_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @return string|object|bool
     */
    function _handle_long_term_duplicate()
    {
    }
    #endregion
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @since 2.1.3
     */
    private static function migrate_options_to_network()
    {
    }
    #----------------------------------------------------------------------------------
    #region Localization
    #----------------------------------------------------------------------------------
    /**
     * Load framework's text domain.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     */
    static function _load_textdomain()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Debugging
    #----------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    static function _add_debug_section()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     */
    static function _toggle_debug_mode()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     */
    static function _get_debug_log()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     */
    static function _get_db_option()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     */
    static function _set_db_option()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    static function _debug_page_actions()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.0
     * 
     * @return array
     */
    static function get_all_modules_sites()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    static function _debug_page_render()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Connectivity Issues
    #----------------------------------------------------------------------------------
    /**
     * Check if Freemius should be turned on for the current plugin install.
     *
     * Note:
     *  $this->_is_on is updated in has_api_connectivity()
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_on()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param bool $flush_if_no_connectivity
     *
     * @return bool
     */
    private function should_run_connectivity_test($flush_if_no_connectivity = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.4
     *
     * @param bool $is_update
     *
     * @return bool
     */
    private function should_turn_fs_on($is_update = \true)
    {
    }
    /**
     * Check if there's any connectivity issue to Freemius API.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool $flush_if_no_connectivity
     *
     * @return bool|null
     */
    function has_api_connectivity($flush_if_no_connectivity = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     */
    private function clear_connectivity_info()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param object    $pong
     * @param bool|null $is_connected
     */
    private function store_connectivity_info($pong, $is_connected)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param bool $is_connected
     */
    private function update_connectivity_info($is_connected)
    {
    }
    /**
     * Force turning Freemius on.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8.1
     *
     * @return bool TRUE if successfully turned on.
     */
    private function turn_on()
    {
    }
    /**
     * Anonymous and unique site identifier (Hash).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.0
     *
     * @param null|int $blog_id Since 2.0.0
     *
     * @return string
     */
    function get_anonymous_id($blog_id = \null)
    {
    }
    /**
     * Returns anonymous network ID.
     *
     * @since  2.4.3
     *
     * @return string
     */
    function get_anonymous_network_id()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @return \WP_User
     */
    static function _get_current_wp_user()
    {
    }
    /**
     * Define cookie constants which are required by Freemius::_get_current_wp_user() since
     * it uses wp_get_current_user() which needs the cookie constants set. When a plugin
     * is network activated the cookie constants are only configured after the network
     * plugins activation, therefore, if we don't define those constants WP will throw
     * PHP warnings/notices.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    2.1.1
     */
    private static function wp_cookie_constants()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return int
     */
    static function get_current_wp_user_id()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param string $email
     *
     * @return bool
     */
    static function is_valid_email($email)
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Email
    #----------------------------------------------------------------------------------
    /**
     * Generates and sends an HTML email with customizable sections.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.2
     *
     * @param string $to_address
     * @param string $subject
     * @param array  $sections
     * @param array  $headers
     *
     * @return bool Whether the email contents were sent successfully.
     */
    private function send_email($to_address, $subject, $sections = array(), $headers = array())
    {
    }
    /**
     * Generates the data for the sections of the email content.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.2
     *
     * @return array
     */
    private function get_email_sections()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Initialization
    #----------------------------------------------------------------------------------
    /**
     * Init plugin's Freemius instance.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param number $id
     * @param string $public_key
     * @param bool   $is_live
     * @param bool   $is_premium
     */
    function init($id, $public_key, $is_live = \true, $is_premium = \true)
    {
    }
    /**
     * Dynamic initiator, originally created to support initiation
     * with parent_id for add-ons.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param array $plugin_info
     *
     * @throws Freemius_Exception
     */
    function dynamic_init(array $plugin_info)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.3
     *
     * @return bool
     */
    private function should_use_freemius_updater_and_dialog()
    {
    }
    /**
     * @param string[] $permissions
     * @param bool     $is_enabled
     * @param int|null $blog_id
     *
     * @return true|object `true` on success, API error object on failure.
     */
    private function update_site_permissions(array $permissions, $is_enabled, $blog_id = \null)
    {
    }
    /**
     * @param string[] $permissions
     * @param bool     $is_enabled
     * @param bool     $has_site_delegated_connection
     *
     * @return true|object `true` on success, API error object on failure.
     */
    private function update_network_permissions(array $permissions, $is_enabled, &$has_site_delegated_connection)
    {
    }
    /**
     * @param mixed $result
     *
     * @return string
     */
    private function get_api_error_message($result)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     */
    function _toggle_permission_tracking_callback()
    {
    }
    /**
     * @param string[] $permissions
     * @param bool     $is_enabled
     * @param int|null $blog_id
     *
     * @return bool|mixed `true` if updated successfully or no update is needed.
     */
    private function toggle_permission_tracking($permissions, $is_enabled, $blog_id = \null)
    {
    }
    /**
     * @param bool     $is_enabled
     * @param int|null $blog_id
     */
    private function toggle_user_permission($is_enabled, $blog_id = \null)
    {
    }
    /**
     * Opt-in back into usage tracking.
     *
     * Note: This will only work if the user opted-in previously.
     *
     * Returns:
     *  1. FALSE  - If the user never opted-in.
     *  2. TRUE   - If successfully opted-in back to usage tracking.
     *  3. object - API result on failure.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1.5
     *
     * @bool $is_enabled
     *
     * @return bool|object
     */
    private function toggle_site_tracking($is_enabled, $blog_id = \null)
    {
    }
    /**
     * If user opted-in and later disabled usage-tracking,
     * re-allow tracking for licensing and updates.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1.5
     *
     * @param bool $is_context_single_site
     */
    private function reconnect_locally($is_context_single_site = \false)
    {
    }
    /**
     * Update permission tracking flags. When updating in a network context, in addition to updating the network-level flags, also update the permissions on the site-level for all non-delegated sites.
     *
     * @param string[] $permissions
     * @param bool     $is_enabled
     * @param int|null $blog_id
     *
     * @return array
     */
    private function update_tracking_permissions($permissions, $is_enabled, $blog_id = \null)
    {
    }
    /**
     * Parse plugin's settings (as defined by the plugin dev).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param array $plugin_info
     *
     * @throws \Freemius_Exception
     */
    private function parse_settings(&$plugin_info)
    {
    }
    /**
     * @param string[] $options
     * @param string   $key
     * @param mixed    $default
     *
     * @return bool
     */
    private function get_option(&$options, $key, $default = \false)
    {
    }
    private function get_bool_option(&$options, $key, $default = \false)
    {
    }
    private function get_numeric_option(&$options, $key, $default = \false)
    {
    }
    /**
     * Gate keeper.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return bool
     */
    private function should_stop_execution()
    {
    }
    /**
     * Triggered after code type has changed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9.1
     */
    function _after_code_type_change()
    {
    }
    /**
     * Handles plugin's code type change (free <--> premium).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function _plugin_code_type_changed()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Add-ons
    #----------------------------------------------------------------------------------
    /**
     * Check if add-on installed and activated on site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string|number $id_or_slug
     * @param bool|null     $is_premium Since 1.2.1.7 can check for specified add-on version.
     *
     * @return bool
     */
    function is_addon_activated($id_or_slug, $is_premium = \null)
    {
    }
    /**
     * Check if add-on was connected to install
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @param  string|number $id_or_slug
     *
     * @return bool
     */
    function is_addon_connected($id_or_slug)
    {
    }
    /**
     * Determines if add-on installed.
     *
     * NOTE: This is a heuristic and only works if the folder/file named as the slug.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param  string|number $id_or_slug
     *
     * @return bool
     */
    function is_addon_installed($id_or_slug)
    {
    }
    /**
     * Get add-on basename.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param  string|number $id_or_slug
     *
     * @return string
     */
    function get_addon_basename($id_or_slug)
    {
    }
    /**
     * Get installed add-ons instances.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return Freemius[]
     */
    function get_installed_addons()
    {
    }
    /**
     * Check if any add-ons of the plugin are installed.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.1
     *
     * @return bool
     */
    function has_installed_addons()
    {
    }
    /**
     * Tell Freemius that the current plugin is an add-on.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number $parent_plugin_id The parent plugin ID
     */
    function init_addon($parent_plugin_id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function is_addon()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.2
     *
     * @param number $parent_product_id
     *
     * @return bool
     */
    function is_addon_of($parent_product_id)
    {
    }
    /**
     * Deactivate add-on if it's premium only and the user does't have a valid license.
     *
     * @param bool $is_after_trial_cancel
     *
     * @return bool If add-on was deactivated.
     */
    private function deactivate_premium_only_addon_without_license($is_after_trial_cancel = \false)
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Sandbox
    #----------------------------------------------------------------------------------
    /**
     * Set Freemius into sandbox mode for debugging.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $secret_key
     */
    function init_sandbox($secret_key)
    {
    }
    /**
     * Check if running payments in sandbox mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return bool
     */
    function is_payments_sandbox()
    {
    }
    #endregion
    /**
     * Check if running test vs. live plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function is_live()
    {
    }
    /**
     * Check if super-admin skipped connection for all sites in the network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function is_network_anonymous()
    {
    }
    /**
     * Check if super-admin opted-in for all sites in the network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function is_network_connected()
    {
    }
    /**
     * Check if the user skipped connecting the account with Freemius.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function is_anonymous()
    {
    }
    /**
     * Check if the user skipped the connection of a specified site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return bool
     */
    function is_anonymous_site($blog_id = 0)
    {
    }
    /**
     * Check if user connected his account and install pending email activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function is_pending_activation()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    private function clear_pending_activation_mode()
    {
    }
    /**
     * Check if plugin must be WordPress.org compliant.
     *
     * @since 1.0.7
     *
     * @return bool
     */
    function is_org_repo_compliant()
    {
    }
    #--------------------------------------------------------------------------------
    #region WP Cron Common
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     *
     * @return object
     */
    private function get_cron_data($name)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     */
    private function clear_cron_data($name)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name         Cron name.
     * @param int    $cron_blog_id The cron executing blog ID.
     */
    private function set_cron_data($name, $cron_blog_id = 0)
    {
    }
    /**
     * Get the cron's executing blog ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     *
     * @return int
     */
    private function get_cron_blog_id($name)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     *
     * @return bool
     */
    private function is_cron_on($name)
    {
    }
    /**
     * Unix timestamp for previous cron execution or false if never executed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     *
     * @return int|false
     */
    private function cron_last_execution($name)
    {
    }
    /**
     * Set cron execution time to now.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name Cron name.
     */
    private function set_cron_execution_timestamp($name)
    {
    }
    /**
     * Sets the keepalive time to now.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.2.3
     *
     * @param bool|null $use_network_level_storage
     */
    private function set_keepalive_timestamp($use_network_level_storage = \null)
    {
    }
    /**
     * Check if cron was executed in the last $period of seconds.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name   Cron name.
     * @param int    $period In seconds
     *
     * @return bool
     */
    private function is_cron_executed($name, $period = \WP_FS__TIME_24_HOURS_IN_SEC)
    {
    }
    /**
     * WP Cron is executed on a site level. When running in a multisite network environment
     * with the network integration activated, for optimization reasons, we are consolidating
     * the installs data sync cron to be executed only from a single site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $except_blog_id Target any except the excluded blog ID.
     *
     * @return int
     */
    private function get_cron_target_blog_id($except_blog_id = 0)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name             Cron name.
     * @param string $action_tag       Callback action tag.
     * @param bool   $is_network_clear If set to TRUE, clear sync cron even if there are installs that are still connected.
     */
    private function clear_cron($name, $action_tag = '', $is_network_clear = \false)
    {
    }
    /**
     * Unix timestamp for next cron execution or false if not scheduled.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name       Cron name.
     * @param string $action_tag Callback action tag.
     *
     * @return int|false
     */
    private function get_next_scheduled_cron($name, $action_tag = '')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $name            Cron name.
     * @param string $action_tag      Callback action tag.
     * @param string $recurrence      'single' or 'daily'.
     * @param int    $start_at        Defaults to now.
     * @param bool   $randomize_start If true, schedule first job randomly during the next 12 hours. Otherwise, schedule job to start right away.
     * @param int    $except_blog_id  Target any except the excluded blog ID.
     */
    private function schedule_cron($name, $action_tag = '', $recurrence = 'single', $start_at = \WP_FS__SCRIPT_START_TIME, $randomize_start = \true, $except_blog_id = 0)
    {
    }
    /**
     * Consolidated cron execution for performance optimization. The max number of API requests is based on the number of unique opted-in users.
     * that doesn't halt page loading.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string   $name     Cron name.
     * @param callable $callable The function that should be executed.
     */
    private function execute_cron($name, $callable)
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Daily Sync Cron
    #----------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    private function is_sync_cron_scheduled()
    {
    }
    /**
     * Get the sync cron's executing blog ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return int
     */
    private function get_sync_cron_blog_id()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     */
    private function run_manual_sync()
    {
    }
    /**
     * Data sync cron job. Replaces the background sync non blocking HTTP request
     * that doesn't halt page loading.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     * @since  2.0.0   Consolidate all the data sync into the same cron for performance optimization. The max number of API requests is based on the number of unique opted-in users.
     */
    function _sync_cron()
    {
    }
    /**
     * The actual data sync cron logic.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int[]    $blog_ids
     * @param int|null $current_blog_id @since 2.2.3. This is passed from the `execute_cron` method and used by the
     *                                  `_sync_plugin_license` method in order to switch to the previous blog when sending
     *                                  updates for a single site in case `execute_cron` has switched to a different blog.
     */
    function _sync_cron_method(array $blog_ids, $current_blog_id = \null)
    {
    }
    /**
     * Check if sync was executed in the last $period of seconds.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param int $period In seconds
     *
     * @return bool
     */
    private function is_sync_executed($period = \WP_FS__TIME_24_HOURS_IN_SEC)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return bool
     */
    private function is_sync_cron_on()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.0
     */
    private function maybe_schedule_sync_cron()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param int  $start_at        Defaults to now.
     * @param bool $randomize_start If true, schedule first job randomly during the next 12 hours. Otherwise, schedule job to start right away.
     * @param int  $except_blog_id  Since 2.0.0 when running in a multisite network environment, the cron execution is consolidated. This param allows excluding excluded specified blog ID from being the cron executor.
     */
    private function schedule_sync_cron($start_at = \WP_FS__SCRIPT_START_TIME, $randomize_start = \true, $except_blog_id = 0)
    {
    }
    /**
     * Add the actual sync function to the cron job hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     */
    private function hook_callback_to_sync_cron()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param bool $is_network_clear Since 2.0.0 If set to TRUE, clear sync cron even if there are installs that are still connected.
     */
    private function clear_sync_cron($is_network_clear = \false)
    {
    }
    /**
     * Unix timestamp for next sync cron execution or false if not scheduled.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return int|false
     */
    function next_sync_cron()
    {
    }
    /**
     * Unix timestamp for previous sync cron execution or false if never executed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return int|false
     */
    function last_sync_cron()
    {
    }
    #endregion Daily Sync Cron ------------------------------------------------------------------
    #----------------------------------------------------------------------------------
    #region Async Install Sync
    #----------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return bool
     */
    private function is_install_sync_scheduled()
    {
    }
    /**
     * Get the sync cron's executing blog ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return int
     */
    private function get_install_sync_cron_blog_id()
    {
    }
    /**
     * Instead of running blocking install sync event, execute non blocking scheduled wp-cron.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param int $except_blog_id Since 2.0.0 when running in a multisite network environment, the cron execution is consolidated. This param allows excluding excluded specified blog ID from being the cron executor.
     */
    private function schedule_install_sync($except_blog_id = 0)
    {
    }
    /**
     * Unix timestamp for previous install sync cron execution or false if never executed.
     *
     * @todo   There's some very strange bug that $this->_storage->install_sync_timestamp value is not being updated. But for sure the sync event is working.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return int|false
     */
    function last_install_sync()
    {
    }
    /**
     * Unix timestamp for next install sync cron execution or false if not scheduled.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @return int|false
     */
    function next_install_sync()
    {
    }
    /**
     * Add the actual install sync function to the cron job hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     */
    private function hook_callback_to_install_sync()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param bool $is_network_clear Since 2.0.0 If set to TRUE, clear sync cron even if there are installs that are still connected.
     */
    private function clear_install_sync_cron($is_network_clear = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     * @since  2.0.0   Consolidate all the data sync into the same cron for performance optimization. The max number of API requests is based on the number of unique opted-in users.
     */
    public function _run_sync_install()
    {
    }
    /**
     * The actual install(s) sync cron logic.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int[]    $blog_ids
     * @param int|null $current_blog_id
     */
    function _sync_install_cron_method(array $blog_ids, $current_blog_id = \null)
    {
    }
    #endregion Async Install Sync ------------------------------------------------------------------
    /**
     * Show a notice that activation is currently pending.
     *
     * @todo Add some sort of mechanism to allow users to update the email address they would like to opt-in with when $is_suspicious_email is true.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param bool|string $email_address
     * @param bool        $is_pending_trial Since 1.2.1.5
     * @param bool        $is_suspicious_email Since 2.5.0 Set to true when there's an indication that email address the user opted in with is fake/dummy/placeholder.
     * @param bool        $has_upgrade_context Since 2.5.3
     * @param bool        $support_email_address Since 2.5.3
     */
    function _add_pending_activation_notice($email_address = \false, $is_pending_trial = \false, $is_suspicious_email = \false, $has_upgrade_context = \false, $support_email_address = \false)
    {
    }
    /**
     * Check if currently in plugin activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     *
     * @return bool
     */
    function is_plugin_activation()
    {
    }
    /**
     *
     * NOTE: admin_menu action executed before admin_init.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _admin_init_action()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    private function should_add_sticky_optin_notice()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     */
    private function add_sticky_optin_admin_notice()
    {
    }
    /**
     * Enqueue connect requires scripts and styles.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     */
    function _enqueue_connect_essentials()
    {
    }
    /**
     * Add connect / opt-in pointer.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     */
    function _add_connect_pointer_script()
    {
    }
    /**
     * Return current page's URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return string
     */
    static function current_page_url()
    {
    }
    /**
     * Check if the current page is the plugin's main admin settings page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function _is_plugin_page()
    {
    }
    /* Events
       ------------------------------------------------------------------------------------------------------------------*/
    /**
     * Delete site install from Database.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool     $store
     * @param int|null $blog_id Since 2.0.0
     *
     * @return false|int The install ID if deleted. Otherwise, FALSE (when install not exist).
     */
    function _delete_site($store = \true, $blog_id = \null)
    {
    }
    /**
     * Delete site install from Database.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param string   $slug
     * @param string   $module_type
     * @param bool     $store
     * @param int|null $blog_id Since 2.0.0
     *
     * @return false|int The install ID if deleted. Otherwise, FALSE (when install not exist).
     */
    static function _delete_site_by_slug($slug, $module_type, $store = \true, $blog_id = \null)
    {
    }
    /**
     * Delete user.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $user_id
     * @param bool   $store
     *
     * @return false|int The user ID if deleted. Otherwise, FALSE (when install not exist).
     */
    private static function delete_user($user_id, $store = \true)
    {
    }
    /**
     * Delete plugin's plans information.
     *
     * @param bool $store                 Flush to Database if true.
     * @param bool $keep_associated_plans If set to false, delete all plans, even if a plan is associated with an install.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _delete_plans($store = \true, $keep_associated_plans = \true)
    {
    }
    /**
     * Delete all plugin licenses.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool $store
     */
    private function _delete_licenses($store = \true)
    {
    }
    /**
     * Check if Freemius was added on new plugin installation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.5
     *
     * @return bool
     */
    function is_plugin_new_install()
    {
    }
    /**
     * Check if it's the first plugin release that is running Freemius.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @return bool
     */
    function is_first_freemius_powered_version()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool|string
     */
    private function get_previous_theme_slug()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    private function can_activate_previous_theme()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.0
     *
     * @return bool
     */
    private function can_activate_theme($slug)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     */
    private function activate_previous_theme()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return string
     */
    function get_previous_theme_activation_url()
    {
    }
    /**
     * Saves the slug of the previous theme if it still exists so that it can be used by the logic in the opt-in
     * form that decides whether to add a close button to the opt-in dialog or not. So after a premium-only theme is
     * activated, the close button will appear and will reactivate the previous theme if clicked. If the previous
     * theme doesn't exist, then there will be no close button.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @param  string        $slug_or_name Old theme's slug or name.
     * @param  bool|WP_Theme $old_theme    WP_Theme instance of the old theme if it still exists.
     */
    function _activate_theme_event_hook($slug_or_name, $old_theme = \false)
    {
    }
    /**
     * Plugin activated hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @uses   FS_Api
     */
    function _activate_plugin_event_hook()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     */
    private function maybe_activate_addon_license()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param FS_Plugin_License $license
     */
    private function maybe_network_activate_addon_license($license = \null)
    {
    }
    /**
     * Tries to activate a bundle license for all supported products if the current product is activated with a bundle license. This is called after activating an available license (not via the license activation dialog but by clicking on a license activation button) for a product via its "Account" page.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.4.0
     *
     * @param FS_Plugin_License $license
     * @param array             $sites
     * @param int               $blog_id
     */
    private function maybe_activate_bundle_license(\FS_Plugin_License $license = \null, $sites = array(), $blog_id = 0)
    {
    }
    /**
     * Try to activate a bundle license for all the bundle products installed on the site.
     *  (1) If a child product install already has a license, the bundle license won't be activated.
     *  (2) On multi-site networks, if the attempt to activate the bundle license is triggered from the network admin, the bundle license activation will only work for non-delegated sites and only if none of them is associated with a license. Even if one of the sites has the product installed with a license key, skip the bundle license activation for the product.
     *  (3) On multi-site networks, if the attempt to activate the bundle license is triggered from a site-level admin, only activate the license if the product is site-level activated or delegated, and the product installation is not yet associated with a license.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.4.0
     *
     * @param FS_Plugin_License $license
     * @param array             $sites
     * @param int               $current_blog_id
     */
    private function activate_bundle_license($license, $sites = array(), $current_blog_id = 0)
    {
    }
    /**
     * Returns a parent license that can be activated for the context product.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param string|null $license_key
     * @param bool        $flush
     *
     * @return FS_Plugin_License
     */
    function get_active_parent_license($license_key = \null, $flush = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return array
     */
    function get_sites_for_network_level_optin()
    {
    }
    /**
     * Delete account.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param bool $check_user Enforce checking if user have plugins activation privileges.
     */
    function delete_account_event($check_user = \true)
    {
    }
    /**
     * Delete network level account.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param bool $check_user Enforce checking if user have plugins activation privileges.
     */
    function delete_network_account_event($check_user = \true)
    {
    }
    /**
     * Plugin deactivation hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    function _deactivate_plugin_hook()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     */
    private function remove_sdk_reference()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param bool     $is_anonymous
     * @param bool|int $network_or_blog_id Since 2.0.0
     */
    private function set_anonymous_mode($is_anonymous = \true, $network_or_blog_id = 0)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     *
     * @param bool|int $network_or_blog_id
     */
    private function unset_anonymous_mode($network_or_blog_id = 0)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int    $blog_id    Site ID.
     * @param int    $user_id    User ID.
     * @param string $domain     Site domain.
     * @param string $path       Site path.
     * @param int    $network_id Network ID. Only relevant on multi-network installations.
     * @param array  $meta       Metadata. Used to set initial site options.
     *
     * @uses   Freemius::is_license_network_active() to check if the context license was network activated by the super-admin.
     * @uses   Freemius::is_network_connected() to check if the super-admin network opted-in.
     * @uses   Freemius::is_network_anonymous() to check if the super-admin network skipped.
     * @uses   Freemius::is_network_delegated_connection() to check if the super-admin network delegated the connection to the site admins.
     */
    public function _after_new_blog_callback($blog_id, $user_id, $domain, $path, $network_id, $meta)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.0
     *
     * @param \WP_Site $new_site
     * @param array    $args
     */
    public function _after_wp_initialize_site_callback(\WP_Site $new_site, $args)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param bool|int|int[] $network_or_blog_ids Since 2.0.0.
     */
    private function reset_anonymous_mode($network_or_blog_ids = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.3
     */
    private function update_license_required_permissions_if_anonymous()
    {
    }
    /**
     * This is used to ensure that before redirecting to the opt-in page after resetting the anonymous mode or
     * deleting the account in the network level, the URL of the page to redirect to is correct.
     *
     * @author Leo Fajardo (@leorw)
     *
     * @since 2.1.3
     */
    private function maybe_set_slug_and_network_menu_exists_flag()
    {
    }
    /**
     * Clears the anonymous mode and redirects to the opt-in screen.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     */
    function connect_again()
    {
    }
    /**
     * Skip account connect, and set anonymous mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     *
     * @param bool|int|int[] $network_or_blog_ids Since 2.5.1
     */
    function skip_connection($network_or_blog_ids = \false)
    {
    }
    /**
     * Skip connection for specific site in the network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int|null $blog_id
     * @param bool     $send_skip
     */
    private function skip_site_connection($blog_id = \null)
    {
    }
    /**
     * Plugin version update hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     */
    private function update_plugin_version_event()
    {
    }
    /**
     * Generate an MD5 signature of a plugins collection.
     * This helper methods used to identify changes in a plugins collection.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param array [string]array $plugins
     *
     * @return string
     */
    private function get_plugins_thumbprint($plugins)
    {
    }
    /**
     * Return a list of modified plugins since the last sync.
     *
     * Note:
     *  There's no point to store a plugins counter since even if the number of
     *  plugins didn't change, we still need to check if the versions are all the
     *  same and the activity state is similar.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return array|false
     */
    private function get_plugins_data_for_api()
    {
    }
    /**
     * Return a list of modified themes since the last sync.
     *
     * Note:
     *  There's no point to store a themes counter since even if the number of
     *  themes didn't change, we still need to check if the versions are all the
     *  same and the activity state is similar.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return array|false
     */
    private function get_themes_data_for_api()
    {
    }
    /**
     * Get site data for API install request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.2
     *
     * @param string[] $override
     * @param bool     $include_plugins   Since 1.1.8 by default include plugin changes.
     * @param bool     $include_themes    Since 1.1.8 by default include plugin changes.
     * @param bool     $include_blog_data Since 2.3.0 by default include the current blog's data (language, title, and URL).
     *
     * @return array
     */
    private function get_install_data_for_api(array $override, $include_plugins = \true, $include_themes = \true, $include_blog_data = \true)
    {
    }
    /**
     * Update installs details.
     *
     * @todo   V1 of multiste network support doesn't support plugin and theme data sending.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string[] string           $override
     * @param bool     $only_diff
     * @param bool     $is_keepalive
     * @param bool     $include_plugins Since 1.1.8 by default include plugin changes.
     * @param bool     $include_themes  Since 1.1.8 by default include plugin changes.
     *
     * @return array
     */
    private function get_installs_data_for_api(array $override, $only_diff = \false, $is_keepalive = \false, $include_plugins = \true, $include_themes = \true)
    {
    }
    /**
     * Compare site actual data to the stored install data and return the differences for an API data sync.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param array    $site
     * @param FS_Site  $install
     * @param string[] string $override
     *
     * @return array
     */
    private function get_install_diff_for_api($site, $install, $override = array())
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.1
     */
    private function send_pending_clone_update_once()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.1
     *
     * @param string  $resolution_type
     * @param FS_Site $clone_context_install
     */
    function send_clone_resolution_update($resolution_type, $clone_context_install)
    {
    }
    /**
     * Update install only if changed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string[] string $override
     * @param bool     $flush
     * @param bool     $is_two_way_sync @since 2.5.0 If true and there's a successful API request, the install sync cron will be cleared.
     *
     * @return false|object|string
     */
    private function send_install_update($override = array(), $flush = \false, $is_two_way_sync = \false)
    {
    }
    /**
     * Update installs only if changed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string[] string $override
     * @param bool     $flush
     * @param bool     $is_two_way_sync @since 2.5.0 If true and there's a successful API request, the install sync cron will be cleared.
     *
     * @return false|object|string
     */
    private function send_installs_update($override = array(), $flush = \false, $is_two_way_sync = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param bool|null $use_network_level_storage
     *
     * @return bool
     */
    private function should_send_keepalive_update($use_network_level_storage = \null)
    {
    }
    /**
     * Syncs the install owner's data if needed (i.e., if the install owner is different from the loaded user).
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     */
    private function maybe_sync_install_user()
    {
    }
    /**
     * Update install only if changed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string[] string $override
     * @param bool     $flush
     */
    function sync_install($override = array(), $flush = \false)
    {
    }
    /**
     * Update install only if changed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string[] string $override
     * @param bool     $flush
     */
    private function sync_installs($override = array(), $flush = \false)
    {
    }
    /**
     * Track install's custom event.
     *
     * IMPORTANT:
     *      Custom event tracking is currently only supported for specific clients.
     *      If you are not one of them, please don't use this method. If you will,
     *      the API will simply ignore your request based on the plugin ID.
     *
     * Need custom tracking for your plugin or theme?
     *      If you are interested in custom event tracking please contact yo@freemius.com
     *      for further details.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param string $name       Event name.
     * @param array  $properties Associative key/value array with primitive values only
     * @param bool   $process_at A valid future date-time in the following format Y-m-d H:i:s.
     * @param bool   $once       If true, event will be tracked only once. IMPORTANT: Still trigger the API call.
     *
     * @return object|false Event data or FALSE on failure.
     *
     * @throws \Freemius_InvalidArgumentException
     */
    public function track_event($name, $properties = array(), $process_at = \false, $once = \false)
    {
    }
    /**
     * Track install's custom event only once, but it still triggers the API call.
     *
     * IMPORTANT:
     *      Custom event tracking is currently only supported for specific clients.
     *      If you are not one of them, please don't use this method. If you will,
     *      the API will simply ignore your request based on the plugin ID.
     *
     * Need custom tracking for your plugin or theme?
     *      If you are interested in custom event tracking please contact yo@freemius.com
     *      for further details.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param string $name       Event name.
     * @param array  $properties Associative key/value array with primitive values only
     * @param bool   $process_at A valid future date-time in the following format Y-m-d H:i:s.
     *
     * @return object|false Event data or FALSE on failure.
     *
     * @throws \Freemius_InvalidArgumentException
     *
     * @user   Freemius::track_event()
     */
    public function track_event_once($name, $properties = array(), $process_at = \false)
    {
    }
    /**
     * Plugin uninstall hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool $check_user Enforce checking if user have plugins activation privileges.
     */
    function _uninstall_plugin_event($check_user = \true)
    {
    }
    /**
     * Set the basename of the current product and hook _activate_plugin_event_hook() to the activation action.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.1
     *
     * @param string $is_premium
     * @param string $caller
     *
     * @return void
     */
    function set_basename($is_premium, $caller)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     * @since  2.2.1 If the context product is in its premium version, use the current module's basename, even if it was renamed.
     *
     * @return string
     */
    function premium_plugin_basename()
    {
    }
    /**
     * Uninstall plugin hook. Called only when connected his account with Freemius for active sites tracking.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     */
    public static function _uninstall_plugin_hook()
    {
    }
    #----------------------------------------------------------------------------------
    #region Plugin Information
    #----------------------------------------------------------------------------------
    /**
     * Load WordPress core plugin.php essential module.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     */
    private static function require_plugin_essentials()
    {
    }
    /**
     * Load WordPress core pluggable.php module.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.2
     */
    private static function require_pluggable_essentials()
    {
    }
    /**
     * Return plugin data.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool $reparse_plugin_metadata
     *
     * @return array
     */
    function get_plugin_data($reparse_plugin_metadata = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     * @since  1.2.2.5 If slug not set load slug by module ID.
     *
     * @return string Plugin slug.
     */
    function get_slug()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.1
     *
     * @return string
     */
    function get_premium_slug()
    {
    }
    /**
     * Retrieve the desired folder name for the product.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @return string Plugin slug.
     */
    function get_target_folder_name()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @return number Plugin ID.
     */
    function get_id()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.2.4
     *
     * @return number|null Bundle ID.
     */
    function get_bundle_id()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return string|null Bundle public key.
     */
    function get_bundle_public_key()
    {
    }
    /**
     * Get whether the SDK has been initiated in the context of a Bundle.
     *
     * This will return true, if `bundle_id` is present in the SDK init parameters.
     *
     * ```php
     * $my_fs = fs_dynamic_init( array(
     *     // ...
     *     'bundle_id'         => 'XXXX', // Will return true since we have bundle id.
     *     'bundle_public_key' => 'pk_XXXX',
     * ) );
     * ```
     *
     * @author Swashata Ghosh (@swashata)
     * @since  2.5.0
     *
     * @return bool True if we are running in bundle context, false otherwise.
     */
    private function has_bundle_context()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @return string Freemius SDK version
     */
    function get_sdk_version()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @return number Parent plugin ID (if parent exist).
     */
    function get_parent_id()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return string
     */
    function get_usage_tracking_terms_url()
    {
    }
    /**
     * @todo (For LiteSDK) We can refactor this and other related functions giving links to several landing pages on freemius.com to come from a separate class like `FS_Terms_Pages`. This would get a `FS_WP_Hook` (hypothetical) instance as a dependency and use it to hook into the `license_activation_terms_url` or related filters. The entry level instance from `ms_fs()` would hold a public read-only variable `my_fs()->terms_pages` which would be an instance of `FS_Terms_Pages` and would hold all the links to the terms pages.
     * @since 2.5.8
     *
     * @return string
     */
    function get_license_activation_terms_url()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return string
     */
    function get_eula_url()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @return string Plugin public key.
     */
    function get_public_key()
    {
    }
    /**
     * Will be available only on sandbox mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return mixed Plugin secret key.
     */
    function get_secret_key()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     *
     * @return bool
     */
    function has_secret_key()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string|bool $premium_suffix
     *
     * @return string
     */
    function get_plugin_name($premium_suffix = \false)
    {
    }
    /**
     * Calculates and stores the product's name. This helper function was created specifically for get_plugin_name() just to make the code clearer.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.1
     *
     * @param string $premium_suffix
     */
    private function set_name($premium_suffix = '')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param bool $reparse_plugin_metadata
     *
     * @return string
     */
    function get_plugin_version($reparse_plugin_metadata = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @return string
     */
    function get_plugin_title()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param bool $lowercase
     *
     * @return string
     */
    function get_module_label($lowercase = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return string
     */
    function get_plugin_basename()
    {
    }
    function get_plugin_folder_name()
    {
    }
    #endregion ------------------------------------------------------------------
    /* Account
       ------------------------------------------------------------------------------------------------------------------*/
    /**
     * Find plugin's slug by plugin's basename.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string $plugin_base_name
     *
     * @return false|string
     */
    private static function find_slug_by_basename($plugin_base_name)
    {
    }
    /**
     * Store the map between the plugin's basename to the slug.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function store_file_slug_map()
    {
    }
    /**
     * @return array[number]FS_User
     */
    static function get_all_users()
    {
    }
    /**
     * @param string   $module_type
     * @param null|int $blog_id Since 2.0.0
     *
     * @return array[string]FS_Site
     */
    private static function get_all_sites($module_type = \WP_FS__MODULE_TYPE_PLUGIN, $blog_id = \null, $is_backup = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.2.2
     *
     * @param string   $option_name
     * @param string   $module_type
     * @param null|int $network_level_or_blog_id Since 2.0.0
     *
     * @return mixed
     */
    private static function get_account_option($option_name, $module_type = \null, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.2.2
     *
     * @param string   $option_name
     * @param mixed    $option_value
     * @param bool     $store
     * @param null|int $network_level_or_blog_id Since 2.0.0
     */
    private function set_account_option($option_name, $option_value, $store, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     *
     * @since  1.2.2.7
     *
     * @param string   $module_type
     * @param string   $option_name
     * @param mixed    $option_value
     * @param bool     $store
     * @param null|int $network_level_or_blog_id Since 2.0.0
     */
    private static function set_account_option_by_module($module_type, $option_name, $option_value, $store, $network_level_or_blog_id = \null)
    {
    }
    /**
     * This method can also return non-entity or non-entities collection option like the `user_id_license_ids_map` option.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @param string        $option_name
     * @param mixed         $default
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_SITE_LEVEL_PARAMS).
     *
     * @return mixed|FS_Plugin[]|FS_User[]|FS_Site[]|FS_Plugin_License[]|FS_Plugin_Plan[]|FS_Plugin_Tag[]
     */
    private static function maybe_get_entities_account_option($option_name, $default = \null, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number|null $module_id
     *
     * @return FS_Plugin_License[]
     */
    private static function get_all_licenses($module_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @return array
     */
    private static function get_all_licenses_by_module_type()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param number      $module_id
     * @param number|null $user_id
     *
     * @return array
     */
    private static function get_user_id_license_ids_map($module_id, $user_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param array       $new_user_id_license_ids_map
     * @param number      $module_id
     * @param number|null $user_id
     */
    private static function store_user_id_license_ids_map($new_user_id_license_ids_map, $module_id, $user_id = \null)
    {
    }
    /**
     * Get a collection of the user's linked license IDs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $user_id
     *
     * @return number[]
     */
    private function get_user_linked_license_ids($user_id)
    {
    }
    /**
     * Override the user's linked license IDs with a new IDs collection.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number   $user_id
     * @param number[] $license_ids
     */
    private function set_user_linked_license_ids($user_id, array $license_ids)
    {
    }
    /**
     * Link a specified license ID to a given user.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $license_id
     * @param number $user_id
     */
    private function link_license_2_user($license_id, $user_id)
    {
    }
    /**
     * @param string|bool $module_type
     *
     * @return FS_Plugin_Plan[]
     */
    private static function get_all_plans($module_type = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return FS_Plugin_Tag[]
     */
    private static function get_all_updates()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return array<number,FS_Plugin[]>|false
     */
    private static function get_all_addons()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return number[]|false
     */
    private static function get_all_account_addons()
    {
    }
    /**
     * Check if user has connected his account (opted-in).
     *
     * Note:
     *      If the user opted-in and opted-out on a later stage,
     *      this will still return true. If you want to check if the
     *      user is currently opted-in, use:
     *          `$fs->is_registered() && $fs->is_tracking_allowed()`
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool $ignore_anonymous_state Since 2.5.1
     *
     * @return bool
     */
    function is_registered($ignore_anonymous_state = \false)
    {
    }
    /**
     * Returns TRUE if the user opted-in and didn't disconnect (opt-out).
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1.5
     *
     * @return bool
     */
    function is_tracking_allowed($blog_id = \null, $install = \null)
    {
    }
    /**
     * Returns TRUE if the user never opted-in or manually opted-out.
     *
     * @author Vova Feldman (@svovaf)
     * @since 1.2.1.5
     *
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_tracking_prohibited($blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.4.0
     *
     * @return bool
     */
    function is_bundle_license_auto_activation_enabled()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return FS_Plugin
     */
    function get_plugin()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return FS_User
     */
    function get_user()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return FS_Site
     */
    function get_site()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function store_site($site)
    {
    }
    /**
     * Deletes the current install with an option to back it up in case restoration will be needed (e.g., if the automatic clone resolution attempt fails).
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function delete_current_install($back_up)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function restore_backup_site()
    {
    }
    /**
     * Get plugin add-ons.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @since  1.1.7.3 If not yet loaded, fetch data from the API.
     *
     * @param bool $flush
     *
     * @return FS_Plugin[]|false
     */
    function get_addons($flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return number[]|false
     */
    function get_account_addons()
    {
    }
    /**
     * Check if user has any
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @return bool
     */
    function has_account_addons()
    {
    }
    /**
     * Get add-on by ID (from local data).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number $id
     *
     * @return FS_Plugin|false
     */
    function get_addon($id)
    {
    }
    /**
     * Get add-on by slug (from local data).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string $slug
     *
     * @param bool   $flush
     *
     * @return FS_Plugin|false
     */
    function get_addon_by_slug($slug, $flush = \false)
    {
    }
    /**
     * @var array<number,object[]> {
     *      @key number   Add-on ID.
     *      @val object[] The add-on's plans and prices object.
     * }
     */
    private $plans_and_pricing_by_addon_id;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return array<number,object[]> {
     *      @key number   Add-on ID.
     *      @val object[] The add-on's plans and prices object.
     * }
     */
    function _get_addons_plans_and_pricing_map_by_id()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param number $addon_id
     * @param bool   $is_installed
     *
     * @return array
     */
    function _get_addon_info($addon_id, $is_installed)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $user_id
     *
     * @return FS_User
     */
    static function _get_user_by_id($user_id)
    {
    }
    /**
     * Checks if a Freemius user_id is associated with a super-admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $user_id
     *
     * @return bool
     */
    private static function is_super_admin($user_id)
    {
    }
    #----------------------------------------------------------------------------------
    #region Plans & Licensing
    #----------------------------------------------------------------------------------
    /**
     * Check if running premium plugin code.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function is_premium()
    {
    }
    /**
     * Get site's plan ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @return number
     */
    function get_plan_id()
    {
    }
    /**
     * Get site's plan title.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @return string
     */
    function get_plan_title()
    {
    }
    /**
     * Get site's plan name.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function get_plan_name()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return FS_Plugin_Plan|false
     */
    function get_plan()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return bool
     */
    function is_trial()
    {
    }
    /**
     * Check if currently in a trial with payment method (credit card or paypal).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @return bool
     */
    function is_paid_trial()
    {
    }
    /**
     * Check if trial already utilized.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    function is_trial_utilized()
    {
    }
    /**
     * Get trial plan information (if in trial).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool|FS_Plugin_Plan
     */
    function get_trial_plan()
    {
    }
    /**
     * Check if the user has an activate, non-expired license on current plugin's install.
     *
     * @since 1.0.9
     *
     * @return bool
     */
    function is_paying()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return bool
     */
    function is_free_plan()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function _has_premium_license()
    {
    }
    /**
     * Check if user has any licenses associated with the plugin (including expired or blocking).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param bool $including_foreign
     *
     * @return bool
     */
    function has_any_license($including_foreign = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool|null $is_localhost
     *
     * @return FS_Plugin_License|false
     */
    function _get_available_premium_license($is_localhost = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool|null $is_localhost
     *
     * @return FS_Plugin_License[]
     */
    function get_available_premium_licenses($is_localhost = \null)
    {
    }
    /**
     * Sync local plugin plans with remote server.
     *
     * IMPORTANT: If for some reason a site is associated with deleted plan, we'll preserve the plan's information and append it as the last plan. This means that if plan is deleted, the is_plan() method will ALWAYS return true for any given argument (it becomes the most inclusive plan).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return FS_Plugin_Plan[]|object
     */
    function _sync_plans()
    {
    }
    /**
     * Check if specified plan exists locally. If not, fetch it and store it.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $plan_id
     *
     * @return \FS_Plugin_Plan|object The plan entity or the API error object on failure.
     */
    private function sync_plan_if_not_exist($plan_id)
    {
    }
    /**
     * Check if specified license exists locally. If not, fetch it and store it.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $license_id
     * @param string $license_key
     *
     * @return \FS_Plugin_Plan|object The plan entity or the API error object on failure.
     */
    private function sync_license_if_not_exist($license_id, $license_key)
    {
    }
    /**
     * Get a collection of unique plan IDs that are associated with any installs in the network.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @return number[]
     */
    private function get_plans_ids_associated_with_installs()
    {
    }
    /**
     * Get a collection of unique license IDs that are associated with any installs in the network.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @return number[]
     */
    private function get_license_ids_associated_with_installs()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param number $id
     *
     * @return FS_Plugin_Plan|false
     */
    function _get_plan_by_id($id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8.1
     *
     * @param string $name
     *
     * @return FS_Plugin_Plan|false
     */
    private function get_plan_by_name($name)
    {
    }
    /**
     * Sync local licenses with remote server.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param number|bool $site_license_id
     * @param number|null $blog_id
     *
     * @return FS_Plugin_License[]|object
     */
    function _sync_licenses($site_license_id = \false, $blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param number $id
     * @param bool   $sync_licenses
     *
     * @return FS_Plugin_License|false
     */
    function _get_license_by_id($id, $sync_licenses = \true)
    {
    }
    /**
     * Get license by ID. Unlike _get_license_by_id(), this method only checks the local storage and return any license, whether it's associated with the current context user/install or not.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $id
     *
     * @return FS_Plugin_License
     */
    private function get_license_by_id($id)
    {
    }
    /**
     * Synchronize the site's context license by fetching the license form the API and updating the local data with it.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return \FS_Plugin_License|mixed
     */
    private function sync_site_license()
    {
    }
    /**
     * Get all user's available licenses for the current module.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $user_id
     *
     * @return FS_Plugin_License[]
     */
    private function get_user_licenses($user_id)
    {
    }
    /**
     * Checks if the context license is network activated except on the given blog ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $except_blog_id
     *
     * @return bool
     */
    private function is_license_network_active($except_blog_id = 0)
    {
    }
    /**
     * Checks if license can be activated on all the network sites (opted-in or skipped) that are not yet associated with a license. If possible, try to make the activation, if not return false.
     *
     * Notice: On success, this method will also update the license activations counters (without updating the license in the storage).
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User           $user
     * @param \FS_Plugin_License $license
     *
     * @return bool
     */
    private function try_activate_license_on_network(\FS_User $user, \FS_Plugin_License $license)
    {
    }
    /**
     * Checks if the given license can be activated on the whole network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_Plugin_License $license
     *
     * @return false|array {
     * @type array[int]FS_Site $installs Blog ID to install map.
     * @type int[]               $sites            Non-connected blog IDs.
     * @type int                 $production_count Production sites count.
     * @type int                 $localhost_count  Production sites count.
     * }
     */
    private function can_activate_license_on_network(\FS_Plugin_License $license)
    {
    }
    /**
     * Activate a given license on a collection of installs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User $user
     * @param string   $license_key
     * @param array    $blog_2_install_map {
     * @key    int Blog ID.
     * @value  FS_Site Blog's associated install.
     *                                     }
     *
     * @return mixed|true
     */
    private function activate_license_on_many_installs(\FS_User $user, $license_key, array $blog_2_install_map)
    {
    }
    /**
     * Activate a given license on a collection of blogs/sites that are not yet opted-in.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @param \FS_User $user
     * @param string   $license_key
     *
     * @return true|mixed True if successful, otherwise, the API result.
     */
    private function activate_license_on_site(\FS_User $user, $license_key)
    {
    }
    /**
     * Activate a given license on a collection of blogs/sites that are not yet opted-in.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User $user
     * @param string   $license_key
     * @param int[]    $site_ids
     *
     * @return true|mixed True if successful, otherwise, the API result.
     */
    private function activate_license_on_many_sites(\FS_User $user, $license_key, array $site_ids = array())
    {
    }
    /**
     * Sync site's license with user licenses.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param FS_Plugin_License|null $new_license
     *
     * @return FS_Plugin_License|null
     */
    function _update_site_license($new_license)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @param \FS_Plugin_License $license
     */
    private function set_license(\FS_Plugin_License $license = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @param FS_Plugin_License $license
     */
    private function maybe_update_whitelabel_flag($license)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @param FS_Plugin_License $license
     * @param FS_User           $license_user
     */
    private function store_last_activated_license_data(\FS_Plugin_License $license, $license_user = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @param bool $ignore_data_debug_mode
     *
     * @return bool
     */
    function is_whitelabeled_by_flag($ignore_data_debug_mode = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @return number
     */
    function get_last_license_user_id()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @param int  $blog_id
     * @param bool $ignore_data_debug_mode
     *
     * @return bool
     */
    function is_whitelabeled($ignore_data_debug_mode = \false, $blog_id = \null)
    {
    }
    /**
     * Sync site's subscription.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_Plugin_License|null $license
     *
     * @return bool|\FS_Subscription
     */
    private function _sync_site_subscription($license)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool|\FS_Plugin_License
     */
    function _get_license()
    {
    }
    /**
     * @param number $license_id
     *
     * @return null|\FS_Subscription
     */
    function _get_subscription($license_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param FS_Subscription $subscription
     */
    function store_subscription(\FS_Subscription $subscription)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     */
    function delete_unused_subscriptions()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @param string $plan  Plan name
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    function is_plan($plan, $exact = \false)
    {
    }
    /**
     * Check if module has only one plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param bool $double_check In some cases developers prefer to release their paid offering as premium-only, even though there is a free version. For those cases, looking at the 'is_premium_only' value isn't enough because the result will return false even when the product has only signle paid plan.
     *
     * @return bool
     */
    function is_single_plan($double_check = \false)
    {
    }
    /**
     * Check if plan based on trial. If not in trial mode, should return false.
     *
     * @since  1.0.9
     *
     * @param string $plan  Plan name
     * @param bool   $exact If true, looks for exact plan. If false, also check "higher" plans.
     *
     * @return bool
     */
    function is_trial_plan($plan, $exact = \false)
    {
    }
    /**
     * Check if plugin has any paid plans.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function has_paid_plan()
    {
    }
    /**
     * Check if plugin has any plan with a trail.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function has_trial_plan()
    {
    }
    /**
     * Check if plugin has any free plan, or is it premium only.
     *
     * Note: If no plans configured, assume plugin is free.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool
     */
    function has_free_plan()
    {
    }
    /**
     * Displays a license activation dialog box when the user clicks on the "Activate License"
     * or "Change License" link on the plugins
     * page.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.9
     */
    function _add_license_activation_dialog_box()
    {
    }
    /**
     * Displays an email address update dialog box when the user clicks on the email address "Edit" button on the "Account" page.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.5.0
     */
    function _add_email_address_update_dialog_box()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _add_email_address_update_option()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _email_address_update_ajax_handler()
    {
    }
    /**
     * Returns a collection of IDs of installs that are associated with the context product and its add-ons, and activated with foreign licenses.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     *
     * @return number[]
     */
    function get_installs_ids_with_foreign_licenses()
    {
    }
    /**
     * Displays the "Change User" dialog box when the user clicks on the "Change User" button on the "Account" page.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     *
     * @param number[] $install_ids
     */
    function _add_user_change_dialog_box($install_ids)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.1
     */
    function _add_data_debug_mode_dialog_box()
    {
    }
    /**
     * Displays a subscription cancellation dialog box when the user clicks on the "Deactivate License"
     * link on the "Account" page or deactivates a plugin and there's an active subscription that is
     * either associated with a non-lifetime single-site license or non-lifetime multisite license that
     * is only activated on a single production site.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.2.1
     *
     * @param bool $is_license_deactivation
     *
     * @return array
     */
    function _get_subscription_cancellation_dialog_box_template_params($is_license_deactivation = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.2
     */
    function _add_premium_version_upgrade_selection_dialog_box()
    {
    }
    /**
     * Displays the opt-out dialog box when the user clicks on the "Opt Out" link on the "Plugins"
     * page.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1.5
     */
    function _add_optout_dialog()
    {
    }
    /**
     * Prepare page to include all required UI and logic for the license activation dialog.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     */
    function _add_license_activation()
    {
    }
    /**
     * Prepares page to include all required UI and logic for the "Change User" dialog.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     */
    function _add_user_change_option()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     */
    function should_handle_user_change()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.2
     */
    function _add_premium_version_upgrade_selection()
    {
    }
    /**
     * @author Edgar Melkonyan
     * @since 2.4.1
     *
     * @throws Freemius_Exception
     */
    function _toggle_whitelabel_mode_ajax_handler()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.0
     */
    function _add_beta_mode_update_handler()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.0
     */
    function _set_beta_mode_ajax_handler()
    {
    }
    /**
     * License activation WP AJAX handler.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.9
     *
     * @uses Freemius::activate_license()
     */
    function _activate_license_ajax_action()
    {
    }
    /**
     * User change WP AJAX handler.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     */
    function _user_change_ajax_action()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2.14
     */
    function starting_migration()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2.14
     */
    function is_migration()
    {
    }
    /**
     *
     * A helper method to activate migrated licenses. If the product is network activated and integrated, the method will network activate the license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.0
     *         
     * @param string      $license_key
     * @param null|bool   $is_marketing_allowed
     * @param null|number $plugin_id
     * @param array       $sites
     * @param int         $blog_id
     *
     * @return array {
     *      @var bool   $success
     *      @var string $error
     *      @var string $next_page
     * }
     *
     * @uses Freemius::activate_license()
     */
    function activate_migrated_license($license_key, $is_marketing_allowed = \null, $plugin_id = \null, $sites = array(), $blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @return string
     */
    function get_pricing_js_path()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @return bool
     */
    function should_use_external_pricing()
    {
    }
    /**
     * The implementation of this method was previously in `_activate_license_ajax_action()`.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.4
     * @since  2.0.0 When a super-admin that hasn't connected before is network activating a license and excluding some of the sites for the license activation, go over the unselected sites in the network and if a site is not connected, skipped, nor delegated, if it's a freemium product then just skip the connection for the site, if it's a premium only product, delegate the connection and license activation to the site admin (Vova Feldman @svovaf).
     * @param string      $license_key
     * @param array       $sites
     * @param null|bool   $is_marketing_allowed
     * @param null|int    $blog_id
     * @param null|number $plugin_id
     * @param null|number $license_owner_id
     * @param bool|null   $is_extensions_tracking_allowed
     * @param bool|null   $is_diagnostic_tracking_allowed Since 2.5.0.2 to allow license activation with minimal data footprint.
     *
     *
     * @return array {
     *      @var bool   $success
     *      @var string $error
     *      @var string $next_page
     * }
     */
    private function activate_license($license_key, $sites = array(), $is_marketing_allowed = \null, $blog_id = \null, $plugin_id = \null, $license_owner_id = \null, $is_extensions_tracking_allowed = \null, $is_diagnostic_tracking_allowed = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.2
     *
     * @return array {
     *      @key   string Product slug.
     *      @value array {
     *          @property FS_Site           $site
     *          @property FS_Plugin_License $license
     *      }
     * }
     */
    private function get_parent_and_addons_installs_info()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3.1
     */
    function _network_activate_ajax_action()
    {
    }
    /**
     * Billing update AJAX callback.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     */
    function _update_billing_ajax_action()
    {
    }
    /**
     * Trial start for anonymous users (AJAX callback).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     */
    function _start_trial_ajax_action()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.0
     */
    function _resend_license_key_ajax_action()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.8
     *
     * @var string
     */
    private static $_pagenow;
    /**
     * Get current page or the referer if executing a WP AJAX request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.8
     *
     * @return string
     */
    static function get_current_page()
    {
    }
    /**
     * Helper method to check if user in the plugins page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @return bool
     */
    static function is_plugins_page()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.2.3
     *
     * @return bool
     */
    static function is_plugin_install_page()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.2
     *
     * @return bool
     */
    static function is_updates_page()
    {
    }
    /**
     * Helper method to check if user in the themes page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.6
     *
     * @return bool
     */
    static function is_themes_page()
    {
    }
    #----------------------------------------------------------------------------------
    #region Affiliation
    #----------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @return bool
     */
    function has_affiliate_program()
    {
    }
    /**
     * Get Plugin ID under which we will track affiliate application.
     *
     * This could either be the Bundle ID or the main plugin ID.
     *
     * @return number Bundle ID if developer has provided one, else the main plugin ID.
     */
    private function get_plugin_id_for_affiliate_terms()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.4
     */
    private function fetch_affiliate_terms()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.4
     */
    private function fetch_affiliate_and_custom_terms()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     */
    private function fetch_affiliate_and_terms()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @return FS_Affiliate
     */
    function get_affiliate()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @return FS_AffiliateTerms
     */
    function get_affiliate_terms()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     */
    function _submit_affiliate_application()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @return array|null
     */
    function get_affiliate_application_data()
    {
    }
    #endregion Affiliation ------------------------------------------------------------
    #----------------------------------------------------------------------------------
    #region URL Generators
    #----------------------------------------------------------------------------------
    /**
     * Alias to pricing_url().
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @uses   pricing_url()
     *
     * @param string $period Billing cycle
     * @param bool   $is_trial
     *
     * @return string
     */
    function get_upgrade_url($period = \WP_FS__PERIOD_ANNUALLY, $is_trial = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @uses   get_upgrade_url()
     *
     * @return string
     */
    function get_trial_url()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.4
     *
     * @param string $new_version
     *
     * @return string
     */
    function version_upgrade_checkout_link($new_version)
    {
    }
    /**
     * Plugin's pricing URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $billing_cycle Billing cycle
     *
     * @param bool   $is_trial
     *
     * @return string
     */
    function pricing_url($billing_cycle = \WP_FS__PERIOD_ANNUALLY, $is_trial = \false)
    {
    }
    /**
     * Checkout page URL.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.6
     *
     * @param string    $billing_cycle Billing cycle
     * @param bool      $is_trial
     * @param array     $extra         (optional) Extra parameters, override other query params.
     * @param bool|null $network
     *
     * @return string
     */
    function checkout_url($billing_cycle = \WP_FS__PERIOD_ANNUALLY, $is_trial = \false, $extra = array(), $network = \null)
    {
    }
    /**
     * Add-on checkout URL.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.1.7
     *
     * @param number    $addon_id
     * @param number    $pricing_id
     * @param string    $billing_cycle
     * @param bool      $is_trial
     * @param bool|null $network
     *
     * @return string
     */
    function addon_checkout_url($addon_id, $pricing_id, $billing_cycle = \WP_FS__PERIOD_ANNUALLY, $is_trial = \false, $network = \null)
    {
    }
    #endregion
    #endregion ------------------------------------------------------------------
    /**
     * Check if plugin has any add-ons.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @since  1.1.7.3 Base logic only on the parameter provided by the developer in the init function.
     *
     * @return bool
     */
    function has_addons()
    {
    }
    /**
     * Check if plugin can work in anonymous mode.
     *
     * @author     Vova Feldman (@svovaf)
     * @since      1.0.9
     *
     * @return bool
     *
     * @deprecated Please use is_enable_anonymous() instead.
     */
    function enable_anonymous()
    {
    }
    /**
     * Check if plugin can work in anonymous mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     * @return bool
     */
    function is_enable_anonymous()
    {
    }
    /**
     * Check if plugin is premium only (no free plans).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9
     *
     * @return bool
     */
    function is_only_premium()
    {
    }
    /**
     * Checks if the plugin's type is "plugin". The other type is "theme".
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    function is_plugin()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return string
     */
    function get_module_type()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return string
     */
    function get_plugin_main_file_path()
    {
    }
    /**
     * Check if module has a premium code version.
     *
     * Serviceware module might be freemium without any
     * premium code version, where the paid features
     * are all part of the service.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @return bool
     */
    function has_premium_version()
    {
    }
    /**
     * Check if feature supported with current site's plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @todo   IMPLEMENT
     *
     * @param number $feature_id
     *
     * @throws Exception
     */
    function is_feature_supported($feature_id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @return bool Is running in SSL/HTTPS
     */
    function is_ssl()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool Is running in AJAX call.
     *
     * @link   http://wordpress.stackexchange.com/questions/70676/how-to-check-if-i-am-in-admin-ajax
     */
    static function is_ajax()
    {
    }
    /**
     * Check if it's an AJAX call targeted for the current module.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     *
     * @param array|string $actions Collection of AJAX actions.
     *
     * @return bool
     */
    function is_ajax_action($actions)
    {
    }
    /**
     * Check if it's an AJAX call targeted for current request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     *
     * @param array|string $actions Collection of AJAX actions.
     * @param number|null  $module_id
     *
     * @return bool
     */
    static function is_ajax_action_static($actions, $module_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @return bool
     */
    static function is_cron()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.0
     *
     * @return bool
     */
    static function is_admin_post()
    {
    }
    /**
     * Check if a real user is visiting the admin dashboard.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @return bool
     */
    function is_user_in_admin()
    {
    }
    /**
     * Check if a real user is in the customizer view.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    static function is_customizer()
    {
    }
    /**
     * Check if running in HTTPS and if site's plan matching the specified plan.
     *
     * @param string $plan
     * @param bool   $exact
     *
     * @return bool
     */
    function is_ssl_and_plan($plan, $exact = \false)
    {
    }
    /**
     * Construct plugin's settings page URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string    $page
     * @param array     $params
     * @param bool|null $network
     *
     * @return string
     */
    function _get_admin_page_url($page = '', $params = array(), $network = \null)
    {
    }
    #--------------------------------------------------------------------------------
    #region Multisite
    #--------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @return bool
     */
    function is_network_active()
    {
    }
    /**
     * Delegate activation for the given sites in the network (or all sites if `null`) to site admins.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param bool|int[] $all_or_blog_ids
     */
    private function delegate_connection($all_or_blog_ids = \true)
    {
    }
    /**
     * Delegate specific network site conncetion to the site admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     */
    private function delegate_site_connection($blog_id)
    {
    }
    /**
     * Check if super-admin delegated the connection of ALL sites to the site admins.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    function is_network_delegated_connection()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return bool
     */
    function is_site_delegated_connection($blog_id = 0)
    {
    }
    /**
     * Check if delegated the connection. When running within the network admin,
     * and haven't specified the blog ID, checks if network level delegated. If running
     * within a site admin or specified a blog ID, check if delegated the connection for
     * the current context site.
     *
     * If executed outside the the admin, check if delegated the connection
     * for the current context site OR the whole network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id If set, checks if network delegated or blog specific delegated.
     *
     * @return bool
     */
    function is_delegated_connection($blog_id = 0)
    {
    }
    /**
     * Check if the current module is active for the site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return bool
     */
    function is_active_for_site($blog_id)
    {
    }
    /**
     * @todo Implement pagination when accessing the subsites collection.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param int $limit  Default to 1,000
     * @param int $offset Default to 0
     *
     * @return array Active & public sites collection.
     */
    static function get_sites($limit = 1000, $offset = 0)
    {
    }
    /**
     * Checks if a given blog is active.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param $blog_id
     *
     * @return bool
     */
    private static function is_site_active($blog_id)
    {
    }
    /**
     * Get a mapping between the site addresses to their blog IDs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return array {
     * @key    string Site address without protocol with a trailing slash.
     * @value  int Site's blog ID.
     * }
     */
    private function get_address_to_blog_map()
    {
    }
    /**
     * Get a mapping between the site addresses to their blog IDs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return array {
     * @key    int     Site's blog ID.
     * @value  FS_Site Associated install.
     * }
     */
    function get_blog_install_map()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     *
     * @param bool|null $is_delegated When `true`, returns only connection delegated blog IDs. When `false`, only non-delegated blog IDs.
     *
     * @return int[]
     */
    private function get_blog_ids($is_delegated = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     *
     * @return int[]
     */
    private function get_non_delegated_blog_ids()
    {
    }
    /**
     * Gets a map of module IDs that the given user has opted-in to.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     *
     * @param number $fs_user_id
     *
     * @return array {
     * @key number $plugin_id
     * @value bool Always true.
     * }
     */
    private static function get_user_opted_in_module_ids_map($fs_user_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @return null|array {
     *      'install' => FS_Site Module's install,
     *      'blog_id' => string The associated blog ID.
     * }
     */
    function find_first_install()
    {
    }
    /**
     * Switches the Freemius site level context to a specified blog.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int     $blog_id
     * @param FS_Site $install
     * @param bool    $flush
     *
     * @return bool Since 2.3.1 returns if a switch was made.
     */
    function switch_to_blog($blog_id, \FS_Site $install = \null, $flush = \false)
    {
    }
    /**
     * Restore the blog context to the blog that originally loaded the module.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function restore_current_blog()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param array|WP_Site $site
     *
     * @return int
     */
    static function get_site_blog_id(&$site)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     *
     * @param WP_Site[]|array[] $sites
     *
     * @return int[]
     */
    static function get_sites_blog_ids($sites)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param array|WP_Site|null $site
     * @param bool               $load_registration Since 2.5.1 When set to `true` the method will attempt to return the subsite's registration date, regardless of the `$site` type and value. In most calls, the registration date will be returned anyway, even when the value is `false`. This param is purely for performance optimization.
     *
     * @return array
     */
    function get_site_info($site = \null, $load_registration = \false)
    {
    }
    /**
     * Load the module's install based on the blog ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int|null $blog_id
     *
     * @return FS_Site
     */
    function get_install_by_blog_id($blog_id = \null)
    {
    }
    /**
     * Check if module is installed on a specified site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_installed_on_site($blog_id = \null)
    {
    }
    /**
     * Check if super-admin connected at least one site via the network opt-in.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    function is_network_registered()
    {
    }
    /**
     * Returns the main user associated with the network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return FS_User
     */
    function get_network_user()
    {
    }
    /**
     * Returns the current context user or the network's main user.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return FS_User
     */
    function get_current_or_network_user()
    {
    }
    /**
     * Returns the main install associated with the network.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return FS_Site
     */
    function get_network_install()
    {
    }
    /**
     * Returns the blog ID that is associated with the main install.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @return int|null
     */
    function get_network_install_blog_id()
    {
    }
    /**
     * Returns the current context install or the network's main install.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return FS_Site
     */
    function get_current_or_network_install()
    {
    }
    /**
     * Check if executing a site level action from the network level admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return false|int If yes, return the requested blog ID.
     */
    private function is_network_level_site_specific_action()
    {
    }
    /**
     * Check if executing an action from the network level admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    private function is_network_level_action()
    {
    }
    /**
     * Needs to be executed after site deactivation, archive, deletion, or flag as spam.
     * The logic updates the network level user and blog, and reschedule the crons if the cron executing site matching the site that is no longer publicly active.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $context_blog_id
     */
    private function update_multisite_data_after_site_deactivation($context_blog_id = 0)
    {
    }
    /**
     * Executed after site deactivation, archive, or flag as spam.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $context_blog_id
     */
    public function _after_site_deactivated_callback($context_blog_id = 0)
    {
    }
    /**
     * Executed after site deletion.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int  $context_blog_id
     * @param bool $drop True if site's database tables should be dropped. Default is false.
     */
    public function _after_site_deleted_callback($context_blog_id = 0, $drop = \false)
    {
    }
    /**
     * Executed after site deletion, called from wp_delete_site
     *
     * @author Dario Curvino (@dudo)
     * @since  2.5.0
     *
     * @param WP_Site $old_site
     */
    public function _after_wpsite_deleted_callback(\WP_Site $old_site)
    {
    }
    /**
     * Executed after site re-activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $context_blog_id
     */
    public function _after_site_reactivated_callback($context_blog_id = 0)
    {
    }
    #endregion Multisite
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string $path
     * @param string $scheme
     * @param bool   $network
     *
     * @return string
     */
    private function admin_url($path = '', $scheme = 'admin', $network = \true)
    {
    }
    /**
     * Check if currently in a specified admin page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param string $page
     *
     * @return bool
     */
    function is_admin_page($page)
    {
    }
    /**
     * Check if currently in the product's main admin page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return bool
     */
    function is_main_admin_page()
    {
    }
    /**
     * Get module's main admin setting page URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return string
     */
    function main_menu_url()
    {
    }
    /**
     * Check if currently on the theme's setting page or
     * on any of the Freemius added pages (via tabs).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     *
     * @deprecated Please use is_product_settings_page() instead;
     */
    function is_theme_settings_page()
    {
    }
    /**
     * Check if currently on the product's main setting page or on any of the Freemius added pages (via tabs).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    function is_product_settings_page()
    {
    }
    /**
     * Plugin's account page + sync license URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.9.1
     *
     * @param bool|number $plugin_id
     * @param bool        $add_action_nonce
     * @param array       $params
     *
     * @return string
     */
    function _get_sync_license_url($plugin_id = \false, $add_action_nonce = \true, $params = array())
    {
    }
    /**
     * Plugin's account URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|string $action
     * @param array       $params
     *
     * @param bool        $add_action_nonce
     *
     * @return string
     */
    function get_account_url($action = \false, $params = array(), $add_action_nonce = \true)
    {
    }
    /**
     * @author  Vova Feldman (@svovaf)
     * @since   1.2.0
     *
     * @param string $tab
     * @param bool   $action
     * @param array  $params
     * @param bool   $add_action_nonce
     *
     * @return string
     *
     * @uses    get_account_url()
     */
    function get_account_tab_url($tab, $action = \false, $params = array(), $add_action_nonce = \true)
    {
    }
    /**
     * Plugin's account URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|string $topic
     * @param bool|string $message
     * @param bool|string $summary Since 2.5.1.
     *
     * @return string
     */
    function contact_url($topic = \false, $message = \false, $summary = \false)
    {
    }
    /**
     * Add-on direct info URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.0
     *
     * @param string $slug
     *
     * @return string
     */
    function addon_url($slug)
    {
    }
    /**
     * Add-ons URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.4.5
     *
     * @return string
     */
    function get_addons_url()
    {
    }
    /* Logger
       ------------------------------------------------------------------------------------------------------------------*/
    /**
     * @param string $id
     * @param bool   $prefix_slug
     *
     * @return FS_Logger
     */
    function get_logger($id = '', $prefix_slug = \true)
    {
    }
    /**
     * Note: This method is used externally so don't delete it.
     *
     * @param      $id
     * @param bool $load_options
     * @param bool $prefix_slug
     *
     * @return FS_Option_Manager
     */
    function get_options_manager($id, $load_options = \false, $prefix_slug = \true)
    {
    }
    /* Security
       ------------------------------------------------------------------------------------------------------------------*/
    private static function _encrypt($str)
    {
    }
    static function _decrypt($str)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param FS_Entity $entity
     *
     * @return FS_Entity Return an encrypted clone entity.
     */
    private static function _encrypt_entity(\FS_Entity $entity)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param FS_Entity $entity
     *
     * @return FS_Entity Return an decrypted clone entity.
     */
    private static function decrypt_entity(\FS_Entity $entity)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string $email
     *
     * @return FS_User|false
     */
    public static function _get_user_by_email($email)
    {
    }
    #----------------------------------------------------------------------------------
    #region Account (Loading, Updates & Activation)
    #----------------------------------------------------------------------------------
    /***
     * Load account information (user + site).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    private function _load_account()
    {
    }
    /**
     * Special user recovery mechanism.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number|null $site_user_id
     *
     * @return \FS_User|mixed
     */
    private function sync_user_by_current_install($site_user_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param FS_User    $user
     * @param FS_Site    $site
     * @param bool|array $plans
     */
    private function _set_account(\FS_User $user, \FS_Site $site, $plans = \false)
    {
    }
    /**
     * Get a sanitized array with the WordPress version, SDK version, and PHP version.
     * Each version is trimmed after the 16th char.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.1
     *
     * @return array
     */
    private function get_versions()
    {
    }
    /**
     * Get sanitized site language.
     *
     * @param string $language
     * @param int    $max_len
     *
     * @since  2.5.1
     * @author Vova Feldman (@svovaf)
     *
     * @return string
     */
    private static function get_sanitized_language($language = '', $max_len = self::LANGUAGE_MAX_CHARS)
    {
    }
    /**
     * Get core version stripped from pre-release and build.
     *
     * @since  2.5.1
     * @author Vova Feldman (@svovaf)
     *
     * @param string $version
     * @param int    $parts
     * @param int    $max_len
     * @param bool   $include_pre_release
     *
     * @return string
     */
    private static function get_core_version($version, $parts = 3, $max_len = self::VERSION_MAX_CHARS, $include_pre_release = \false)
    {
    }
    /**
     * @param string $prop
     * @param mixed  $val
     *
     * @return mixed
     *@author Vova Feldman (@svovaf)
     *
     * @since  2.5.1
     */
    private static function get_api_sanitized_property($prop, $val)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return bool
     */
    function has_beta_update()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return bool
     */
    function is_beta()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param array         $override_with
     * @param bool|int|null $network_level_or_blog_id If true, return params for network level opt-in. If integer, get params for specified blog in the network.
     *
     * @return array
     */
    function get_opt_in_params($override_with = array(), $network_level_or_blog_id = \null)
    {
    }
    /**
     * 1. If successful opt-in or pending activation returns the next page that the user should be redirected to.
     * 2. If there was an API error, return the API result.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param string|bool $email
     * @param string|bool $first
     * @param string|bool $last
     * @param string|bool $license_key
     * @param bool        $is_uninstall         If "true", this means that the module is currently being uninstalled.
     *                                          In this case, the user and site info will be sent to the server but no
     *                                          data will be saved to the WP installation's database.
     * @param number|bool $trial_plan_id
     * @param bool        $is_disconnected      Whether to opt in without tracking.
     * @param null|bool   $is_marketing_allowed
     * @param array       $sites                If network-level opt-in, an array of containing details of sites.
     * @param bool        $redirect
     *
     * @return string|object
     * @use    WP_Error
     */
    function opt_in($email = \false, $first = \false, $last = \false, $license_key = \false, $is_uninstall = \false, $trial_plan_id = \false, $is_disconnected = \false, $is_marketing_allowed = \null, $sites = array(), $redirect = \true)
    {
    }
    /**
     * Set user and site identities.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_User $user
     * @param FS_Site $site
     * @param bool    $redirect
     * @param bool    $auto_install Since 1.2.1.7 If `true` and setting up an account with a valid license, will
     *                              redirect (or return a URL) to the account page with a special parameter to
     *                              trigger the auto installation processes.
     *
     * @return string If redirect is `false`, returns the next page the user should be redirected to.
     */
    function setup_account(\FS_User $user, \FS_Site $site, $redirect = \true, $auto_install = \false)
    {
    }
    /**
     * Set user and site identities.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param FS_User   $user
     * @param FS_Site[] $installs
     * @param bool      $redirect
     * @param bool      $auto_install Since 1.2.1.7 If `true` and setting up an account with a valid license, will redirect (or return a URL) to the account page with a special parameter to trigger the auto installation processes.
     * @param bool      $is_network_level_opt_in
     *
     * @return string If redirect is `false`, returns the next page the user should be redirected to.
     */
    function setup_network_account(\FS_User $user, array $installs, $redirect = \true, $auto_install = \false, $is_network_level_opt_in = \true)
    {
    }
    /**
     * Install plugin with new user information after approval.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _install_with_new_user()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $id
     * @param string $public_key
     * @param string $secret_key
     *
     * @return \FS_User
     */
    private function setup_user($id, $public_key, $secret_key)
    {
    }
    /**
     * Install plugin with new user.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param number    $user_id
     * @param string    $user_public_key
     * @param string    $user_secret_key
     * @param bool|null $is_marketing_allowed
     * @param bool|null $is_extensions_tracking_allowed Since 2.3.2
     * @param bool|null $is_diagnostic_tracking_allowed Since 2.5.0.2
     * @param number    $install_id
     * @param string    $install_public_key
     * @param string    $install_secret_key
     * @param bool      $redirect
     * @param bool      $auto_install                   Since 1.2.1.7 If `true` and setting up an account with a valid license, will redirect (or return a URL) to the account page with a special parameter to trigger the auto installation processes.
     *
     * @return string If redirect is `false`, returns the next page the user should be redirected to.
     */
    private function install_with_new_user($user_id, $user_public_key, $user_secret_key, $is_marketing_allowed, $is_extensions_tracking_allowed, $is_diagnostic_tracking_allowed, $install_id, $install_public_key, $install_secret_key, $redirect = \true, $auto_install = \false)
    {
    }
    /**
     * Install plugin with user.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param number    $user_id
     * @param string    $user_public_key
     * @param string    $user_secret_key
     * @param bool|null $is_marketing_allowed
     * @param bool|null $is_extensions_tracking_allowed Since 2.3.2
     * @param bool|null $is_diagnostic_tracking_allowed Since 2.5.0.2
     * @param array     $site_ids
     * @param bool      $license_key
     * @param bool      $trial_plan_id
     * @param bool      $redirect
     *
     * @return void
     */
    private function install_many_pending_with_user($user_id, $user_public_key, $user_secret_key, $is_marketing_allowed, $is_extensions_tracking_allowed, $is_diagnostic_tracking_allowed, $site_ids, $license_key = \false, $trial_plan_id = \false, $redirect = \true)
    {
    }
    /**
     * Multi-site install with a new user.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number    $user_id
     * @param string    $user_public_key
     * @param string    $user_secret_key
     * @param bool|null $is_marketing_allowed
     * @param bool|null $is_extensions_tracking_allowed Since 2.3.2
     * @param bool|null $is_diagnostic_tracking_allowed Since 2.5.0.2
     * @param object[]  $installs
     * @param bool      $redirect
     * @param bool      $auto_install                   Since 1.2.1.7 If `true` and setting up an account with a valid license, will redirect (or return a URL) to the account page with a special parameter to trigger the auto installation processes.
     *
     * @return string If redirect is `false`, returns the next page the user should be redirected to.
     */
    private function install_many_with_new_user($user_id, $user_public_key, $user_secret_key, $is_marketing_allowed, $is_extensions_tracking_allowed, $is_diagnostic_tracking_allowed, array $installs, $redirect = \true, $auto_install = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param string|bool $email
     * @param bool        $redirect
     * @param string|bool $license_key      Since 1.2.1.5
     * @param bool        $is_pending_trial Since 1.2.1.5
     * @param bool        $is_suspicious_email Since 2.5.0
     * @param bool        $has_upgrade_context Since 2.5.3
     * @param bool|string $support_email_address Since 2.5.3
     *
     * @return string Since 1.2.1.5 if $redirect is `false`, return the pending activation page.
     */
    private function set_pending_confirmation($email = \false, $redirect = \true, $license_key = \false, $is_pending_trial = \false, $is_suspicious_email = \false, $has_upgrade_context = \false, $support_email_address = \false)
    {
    }
    /**
     * Install plugin with current logged WP user info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _install_with_current_user()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @param string|bool $license_key
     * @param number|bool $trial_plan_id
     * @param array       $sites Since 2.0.0
     * @param bool        $redirect
     *
     * @return object|string If redirect is `false`, returns the next page the user should be redirected to, or the API error object if failed to install.
     */
    function install_with_current_user($license_key = \false, $trial_plan_id = \false, $sites = array(), $redirect = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User    $user
     * @param string|bool $license_key
     * @param number|bool $trial_plan_id
     * @param bool        $redirect
     * @param bool        $setup_account Since 2.0.0. When set to FALSE, executes a light installation without setting up the account as if it's the first opt-in.
     * @param array       $sites         Since 2.0.0. If not empty, should be a collection of site details for the bulk install API request.
     *
     * @return \FS_Site|object|string If redirect is `false`, returns the next page the user should be redirected to, or the API error object if failed to install. If $setup_account is set to `false`, return the newly created install.
     */
    function install_with_user(\FS_User $user, $license_key = \false, $trial_plan_id = \false, $redirect = \true, $setup_account = \true, $sites = array())
    {
    }
    /**
     * Initiate an API request to create a collection of installs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User $user
     * @param bool     $license_key
     * @param bool     $trial_plan_id
     * @param array    $sites
     * @param bool     $redirect
     * @param bool     $silent
     *
     * @return object|mixed
     */
    private function create_installs_with_user(\FS_User $user, $license_key = \false, $trial_plan_id = \false, $sites = array(), $redirect = \false, $silent = \false)
    {
    }
    /**
     * Tries to activate add-on account based on parent plugin info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param Freemius          $parent_fs
     * @param bool|int|null     $network_level_or_blog_id True for network level opt-in and integer for opt-in for specified blog in the network.
     * @param FS_Plugin_License $bundle_license           Since 2.4.0. If provided, this license will be activated for the add-on.
     */
    private function _activate_addon_account(\Freemius $parent_fs, $network_level_or_blog_id = \null, \FS_Plugin_License $bundle_license = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param FS_Site[] $installs
     * @param bool      $is_site_level
     */
    private function handle_account_connection($installs, $is_site_level)
    {
    }
    /**
     * Tries to activate parent account based on add-on's info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param Freemius $parent_fs
     */
    private function activate_parent_account(\Freemius $parent_fs)
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Admin Menu Items
    #----------------------------------------------------------------------------------
    private $_menu_items = array();
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.8
     *
     * @return array
     */
    function get_menu_items()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return string
     */
    function get_menu_slug()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function _prepare_admin_menu()
    {
    }
    /**
     * Admin dashboard menu items modifications.
     *
     * NOTE: admin_menu action executed before admin_init.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     */
    private function add_menu_action()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    function _redirect_on_clicked_menu_link()
    {
    }
    /**
     * Remove plugin's all admin menu items & pages, and replace with activation page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    private function override_plugin_menu_with_activation()
    {
    }
    /**
     * If a plugin was network activated and connected but don't have a network
     * level settings, then add an artificial menu item for the Account and other
     * Freemius settings.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private function add_network_menu_when_missing()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1
     *
     * return string
     */
    function get_top_level_menu_capability()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @return string
     */
    private function get_top_level_menu_slug()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return string
     */
    function get_pricing_cta_label()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    function is_pricing_page_visible()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param bool $is_activation_mode
     *
     * @return bool
     */
    private function should_add_submenu_or_action_links($is_activation_mode)
    {
    }
    /**
     * Add default Freemius menu items.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     * @since  1.2.2.7 Also add submenu items when running in a free .org theme so the tabs will be visible.
     */
    private function add_submenu_items()
    {
    }
    /**
     * Moved the actual submenu item additions to a separated function,
     * in order to support sub-submenu items when the plugin's settings
     * only have a submenu and not top-level menu item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     */
    private function embed_submenu_items()
    {
    }
    /**
     * Re-order the submenu items so all Freemius added new submenu items
     * are added right after the plugin's settings submenu item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     */
    private function order_sub_submenu_items()
    {
    }
    /**
     * Helper method to return the module's support forum URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return string
     */
    function get_support_forum_url()
    {
    }
    /**
     * Displays the Support Forum link when enabled.
     *
     * Can be filtered like so:
     *
     *  function _fs_show_support_menu( $is_visible, $menu_id ) {
     *      if ( 'support' === $menu_id ) {
     *            return _fs->is_registered();
     *        }
     *        return $is_visible;
     *    }
     *    _fs()->add_filter('is_submenu_visible', '_fs_show_support_menu', 10, 2);
     *
     */
    function _add_default_submenu_items()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param string        $menu_title
     * @param callable      $render_function
     * @param bool|string   $page_title
     * @param string        $capability
     * @param bool|string   $menu_slug
     * @param bool|callable $before_render_function
     * @param int           $priority
     * @param bool          $show_submenu
     * @param string        $class Since 1.2.1.5 can add custom classes to menu items.
     */
    function add_submenu_item($menu_title, $render_function, $page_title = \false, $capability = 'manage_options', $menu_slug = \false, $before_render_function = \false, $priority = \WP_FS__DEFAULT_PRIORITY, $show_submenu = \true, $class = '')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param string $menu_title
     * @param string $url
     * @param bool   $menu_slug
     * @param string $capability
     * @param int    $priority
     * @param bool   $show_submenu
     */
    function add_submenu_link_item($menu_title, $url, $menu_slug = \false, $capability = 'read', $priority = \WP_FS__DEFAULT_PRIORITY, $show_submenu = \true)
    {
    }
    #endregion ------------------------------------------------------------------
    #--------------------------------------------------------------------------------
    #region Admin Notices
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @param string|string[] $ids
     * @param int|null        $network_level_or_blog_id
     *
     * @uses FS_Admin_Notices::remove_sticky()
     */
    function remove_sticky($ids, $network_level_or_blog_id = \null)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Actions / Hooks / Filters
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @param string $tag
     *
     * @return string
     */
    public function get_action_tag($tag)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param string $tag
     * @param string $slug
     * @param bool   $is_plugin
     *
     * @return string
     */
    static function get_action_tag_static($tag, $slug = '', $is_plugin = \true)
    {
    }
    /**
     * Returns a string that can be used to generate a unique action name,
     * option name, HTML element ID, or HTML element class.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return string
     */
    public function get_unique_affix()
    {
    }
    /**
     * Returns a string that can be used to generate a unique action name,
     * option name, HTML element ID, or HTML element class.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.5
     *
     * @param string $slug
     * @param bool   $is_plugin
     *
     * @return string
     */
    static function get_module_unique_affix($slug, $is_plugin = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     * @since  1.2.2.5 The AJAX action names are based on the module ID, not like the non-AJAX actions that are
     *         based on the slug for backward compatibility.
     *
     * @param string $tag
     *
     * @return string
     */
    function get_ajax_action($tag)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param string $tag
     *
     * @return string
     */
    function get_ajax_security($tag)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param string $tag
     */
    function check_ajax_referer($tag)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     * @since  1.2.2.5 The AJAX action names are based on the module ID, not like the non-AJAX actions that are
     *         based on the slug for backward compatibility.
     *
     * @param string      $tag
     * @param number|null $module_id
     *
     * @return string
     */
    static function get_ajax_action_static($tag, $module_id = \null)
    {
    }
    /**
     * Do action, specific for the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param string $tag     The name of the action to be executed.
     * @param mixed  $arg,... Optional. Additional arguments which are passed on to the
     *                        functions hooked to the action. Default empty.
     *
     * @uses   do_action()
     */
    function do_action($tag, $arg = '')
    {
    }
    /**
     * Add action, specific for the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param string   $tag
     * @param callable $function_to_add
     * @param int      $priority
     * @param int      $accepted_args
     *
     * @uses   add_action()
     */
    function add_action($tag, $function_to_add, $priority = \WP_FS__DEFAULT_PRIORITY, $accepted_args = 1)
    {
    }
    /**
     * Add AJAX action, specific for the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param string   $tag
     * @param callable $function_to_add
     * @param int      $priority
     *
     * @uses   add_action()
     *
     * @return bool True if action added, false if no need to add the action since the AJAX call isn't matching.
     */
    function add_ajax_action($tag, $function_to_add, $priority = \WP_FS__DEFAULT_PRIORITY)
    {
    }
    /**
     * Add AJAX action.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param string      $tag
     * @param callable    $function_to_add
     * @param int         $priority
     * @param number|null $module_id
     *
     * @return bool True if action added, false if no need to add the action since the AJAX call isn't matching.
     * @uses   add_action()
     *
     */
    static function add_ajax_action_static($tag, $function_to_add, $priority = \WP_FS__DEFAULT_PRIORITY, $module_id = \null)
    {
    }
    /**
     * Send a JSON response back to an Ajax request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $response
     */
    static function shoot_ajax_response($response)
    {
    }
    /**
     * Send a JSON response back to an Ajax request, indicating success.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $data Data to encode as JSON, then print and exit.
     */
    static function shoot_ajax_success($data = \null)
    {
    }
    /**
     * Send a JSON response back to an Ajax request, indicating failure.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $error Optional error message.
     */
    static function shoot_ajax_failure($error = '')
    {
    }
    /**
     * Returns an AJAX URL with a special extra param to indicate whether the request was triggered from the network admin or blog admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.5.1
     *
     * @param string $wrap_with By default, returns the AJAX URL wrapped with single quotes.
     *
     * @return string
     */
    static function ajax_url($wrap_with = "'")
    {
    }
    /**
     * Apply filter, specific for the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string $tag   The name of the filter hook.
     * @param mixed  $value The value on which the filters hooked to `$tag` are applied on.
     *
     * @return mixed The filtered value after all hooked functions are applied to it.
     *
     * @uses   apply_filters()
     */
    function apply_filters($tag, $value)
    {
    }
    /**
     * Add filter, specific for the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string   $tag
     * @param callable $function_to_add
     * @param int      $priority
     * @param int      $accepted_args
     *
     * @uses   add_filter()
     */
    function add_filter($tag, $function_to_add, $priority = \WP_FS__DEFAULT_PRIORITY, $accepted_args = 1)
    {
    }
    /**
     * Check if has filter.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     *
     * @param string        $tag
     * @param callable|bool $function_to_check Optional. The callback to check for. Default false.
     *
     * @return false|int
     *
     * @uses   has_filter()
     */
    function has_filter($tag, $function_to_check = \false)
    {
    }
    #endregion
    /**
     * Override default i18n text phrases.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string[] string $key_value
     *
     * @uses   fs_override_i18n()
     */
    function override_i18n($key_value)
    {
    }
    /* Account Page
       ------------------------------------------------------------------------------------------------------------------*/
    /**
     * Update site information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool     $store                    Flush to Database if true.
     * @param null|int $network_level_or_blog_id Since 2.0.0
     * @param \FS_Site $site                     Since 2.0.0
     */
    private function _store_site($store = \true, $network_level_or_blog_id = \null, \FS_Site $site = \null, $is_backup = \false)
    {
    }
    /**
     * Stores the context site in the sites backup storage. This logic is used before deleting the site info so that it can be restored later on if necessary (e.g., if the automatic clone resolution attempt fails).
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    private function back_up_site()
    {
    }
    /**
     * Update plugin's plans information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @param bool $store Flush to Database if true.
     */
    private function _store_plans($store = \true)
    {
    }
    /**
     * Update user's plugin licenses.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool                $store
     * @param number|bool         $module_id
     * @param FS_Plugin_License[] $licenses
     */
    private function _store_licenses($store = \true, $module_id = \false, $licenses = array())
    {
    }
    /**
     * Update user information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param bool $store Flush to Database if true.
     */
    private function _store_user($store = \true)
    {
    }
    /**
     * Update new updates information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param FS_Plugin_Tag|null $update
     * @param bool               $store Flush to Database if true.
     * @param bool|number        $plugin_id
     */
    private function _store_update($update, $store = \true, $plugin_id = \false)
    {
    }
    /**
     * Update new updates information.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.6
     *
     * @param FS_Plugin[] $plugin_addons
     * @param bool        $store Flush to Database if true.
     */
    private function _store_addons($plugin_addons, $store = \true)
    {
    }
    /**
     * Delete plugin's associated add-ons.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.8
     *
     * @param bool $store
     *
     * @return bool
     */
    private function _delete_account_addons($store = \true)
    {
    }
    /**
     * Update account add-ons list.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.6
     *
     * @param FS_Plugin[] $addons
     * @param bool        $store Flush to Database if true.
     */
    private function _store_account_addons($addons, $store = \true)
    {
    }
    /**
     * Purges the cache for the valid user licenses API call so that when the `Account` or `Add-Ons` page is loaded,
     * the valid user licenses will be fetched again and the account add-ons may be updated.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.2.4
     */
    private function purge_valid_user_licenses_cache()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param array       $all_licenses
     * @param number|null $site_license_id
     * @param bool        $include_parent_licenses
     *
     * @return array
     */
    private function get_foreign_licenses_info($all_licenses, $site_license_id = \null, $include_parent_licenses = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return string
     */
    private function get_valid_user_licenses_endpoint()
    {
    }
    /**
     * Fetches active licenses that are enriched with product type if there's a context `bundle_id` and bundle
     * licenses enriched with product IDs if there are any. From the licenses, the `get_updated_account_addons`
     * method filters out non–add-on product IDs and stores the add-on IDs.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.2.4
     *
     * @return stdClass[] array
     */
    private function fetch_valid_user_licenses()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.4
     *
     * @return number[] Account add-on IDs.
     */
    function get_updated_account_addons()
    {
    }
    /**
     * Store account params in the Database.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @param null|int $blog_id Since 2.0.0
     */
    private function _store_account($blog_id = \null)
    {
    }
    /**
     * Sync user's information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     * @uses   FS_Api
     */
    private function _handle_account_user_sync()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     * @uses   FS_Api
     *
     * @param number|bool $license_id
     *
     * @return FS_Subscription|object|bool
     */
    private function _fetch_site_license_subscription($license_id = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     * @uses   FS_Api
     *
     * @param number|bool $plan_id
     *
     * @return FS_Plugin_Plan|object
     */
    private function _fetch_site_plan($plan_id = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     * @uses   FS_Api
     *
     * @return FS_Plugin_Plan[]|object
     */
    private function _fetch_plugin_plans()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $plan_id
     *
     * @return \FS_Plugin_Plan|object
     */
    private function fetch_plan_by_id($plan_id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     * @uses   FS_Api
     *
     * @param number|bool $plugin_id
     * @param number|bool $site_license_id
     * @param array       $foreign_licenses @since 2.0.0. This is used by network-activated plugins.
     * @param number|null $blog_id
     *
     * @return FS_Plugin_License[]|object
     */
    private function _fetch_licenses($plugin_id = \false, $site_license_id = \false, $foreign_licenses = array(), $blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param number $license_id
     * @param string $license_key
     *
     * @return \FS_Plugin_License|object
     */
    private function fetch_license_by_key($license_id, $license_key)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     * @uses   FS_Api
     *
     * @param number|bool $plugin_id
     * @param bool        $flush
     *
     * @return FS_Payment[]|object
     */
    function _fetch_payments($plugin_id = \false, $flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     * @uses   FS_Api
     *
     * @param bool $flush
     *
     * @return \FS_Billing|mixed
     */
    function _fetch_billing($flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param FS_Plugin_License[] $licenses
     * @param number              $module_id
     */
    private function _update_licenses($licenses, $module_id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|number $plugin_id
     * @param bool        $flush      Since 1.1.7.3
     * @param int         $expiration Since 1.2.2.7
     * @param bool|string $newer_than Since 2.2.1
     *
     * @return object|false New plugin tag info if exist.
     */
    private function _fetch_newer_version($plugin_id = \false, $flush = \true, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC, $newer_than = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool|number $plugin_id
     * @param bool        $flush      Since 1.1.7.3
     * @param int         $expiration Since 1.2.2.7
     * @param bool|string $newer_than Since 2.2.1
     *
     * @return bool|FS_Plugin_Tag
     */
    function get_update($plugin_id = \false, $flush = \true, $expiration = \FS_Plugin_Updater::UPDATES_CHECK_CACHE_EXPIRATION, $newer_than = \false)
    {
    }
    /**
     * Check if site assigned with active license.
     *
     * @author     Vova Feldman (@svovaf)
     * @since      1.0.6
     *
     * @deprecated Please use has_active_valid_license() instead because license can be cancelled.
     */
    function has_active_license()
    {
    }
    /**
     * Check if site assigned with active & valid (not expired) license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param bool $check_expiration
     */
    function has_active_valid_license($check_expiration = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.1
     */
    function is_data_debug_mode()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.1
     */
    function _set_data_debug_mode()
    {
    }
    /**
     * Check if a given license is active & valid (not expired).
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.3
     *
     * @param FS_Plugin_License $license
     * @param bool              $check_expiration
     *
     * @return bool
     */
    private static function is_active_valid_license($license, $check_expiration = \true)
    {
    }
    /**
     * Checks if there's any site that is associated with an active & valid license.
     * This logic is used to determine if the admin can download the premium code base from a network level admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.3
     *
     * @return bool
     */
    function has_any_active_valid_license()
    {
    }
    /**
     * Check if site assigned with license with enabled features.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function has_features_enabled_license()
    {
    }
    /**
     * Checks if the product is activated with a bundle license.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.4.0
     *
     * @return bool
     */
    function is_activated_with_bundle_license()
    {
    }
    /**
     * Check if user is a trial or have feature enabled license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @return bool
     */
    function can_use_premium_code()
    {
    }
    /**
     * Checks if the current user can activate plugins or switch themes. Note that this method should only be used
     * after the `init` action is triggered because it is using `current_user_can()` which is only functional after
     * the context user is authenticated.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    function is_user_admin()
    {
    }
    /**
     * Sync site's plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @uses   FS_Api
     *
     * @param bool $background             Hints the method if it's a background sync. If false, it means that was initiated by
     *                                     the admin.
     * @param bool $is_context_single_site @since 2.0.0. This is used when syncing a license for a single install from the
     *                                     network-level "Account" page.
     * @param int|null $current_blog_id    @since 2.2.3. This is passed from the `execute_cron` method and used by the
     *                                     `_sync_plugin_license` method in order to switch to the previous blog when sending
     *                                      updates for a single site in case `execute_cron` has switched to a different blog.
     */
    private function _sync_license($background = \false, $is_context_single_site = \false, $current_blog_id = \null)
    {
    }
    /**
     * Sync plugin's add-on license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     * @uses   FS_Api
     *
     * @param number $addon_id
     * @param bool   $background
     */
    private function _sync_addon_license($addon_id, $background)
    {
    }
    /**
     * Sync site's plugin plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     * @uses   FS_Api
     *
     * @param bool $background             Hints the method if it's a background sync. If false, it means that was initiated by the admin.
     * @param bool $send_installs_update   Since 2.0.0
     * @param bool $is_context_single_site Since 2.0.0. This is used when sending an update for a single install and
     *                                     syncing its license from the network-level "Account" page (e.g.: after
     *                                     activating a license only for the single install).
     * @param int|null $current_blog_id    Since 2.2.3. This is passed from the `execute_cron` method so that it
     *                                     can be used here to switch to the previous blog in case `execute_cron`
     *                                     has switched to a different blog.
     */
    private function _sync_plugin_license($background = \false, $send_installs_update = \true, $is_context_single_site = \false, $current_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param mixed $result
     *
     * @return string
     */
    private function generate_api_blocked_notice_message_from_result($result)
    {
    }
    /**
     * Include the required JS at the footer of the admin to trigger the license activation dialog box.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    public function _open_license_activation_dialog_box()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool                   $background
     * @param FS_Plugin_License|null $premium_license
     */
    protected function _activate_license($background = \false, $premium_license = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool $show_notice
     */
    protected function _deactivate_license($show_notice = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.1
     *
     * @param FS_Plugin_License $license
     * @param bool|string       $hmm_text
     * @param bool              $show_notice
     */
    private function handle_license_deactivation_result($license, $hmm_text = \false, $show_notice = \true)
    {
    }
    /**
     * Site plan downgrade.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return object
     *
     * @uses   FS_Api
     */
    private function _downgrade_site()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8.1
     *
     * @param bool|string $plan_name
     *
     * @return bool If trial was successfully started.
     */
    function start_trial($plan_name = \false)
    {
    }
    /**
     * Cancel site trial.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return object
     *
     * @uses   FS_Api
     */
    private function _cancel_trial()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool|number $plugin_id
     *
     * @return bool
     */
    private function _is_addon_id($plugin_id)
    {
    }
    /**
     * Check if user eligible to download premium version updates.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    private function _can_download_premium()
    {
    }
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool|number $addon_id
     * @param string      $type "json" or "zip"
     *
     * @return string
     */
    private function _get_latest_version_endpoint($addon_id = \false, $type = 'json')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|number $addon_id
     * @param bool        $flush        Since 1.1.7.3
     * @param int         $expiration   Since 1.2.2.7
     * @param bool|string $newer_than   Since 2.2.1
     * @param bool|string $fetch_readme Since 2.2.1
     *
     * @return object|false Plugin latest tag info.
     */
    function _fetch_latest_version($addon_id = \false, $flush = \true, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC, $newer_than = \false, $fetch_readme = \true)
    {
    }
    #----------------------------------------------------------------------------------
    #region Download Plugin
    #----------------------------------------------------------------------------------
    /**
     * Download latest plugin version, based on plan.
     *
     * Not like _download_latest(), this will redirect the page
     * to secure download url to prevent dual download (from FS to WP server,
     * and then from WP server to the client / browser).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool|number $plugin_id
     *
     * @uses   FS_Api
     * @uses   wp_redirect()
     */
    private function download_latest_directly($plugin_id = \false)
    {
    }
    /**
     * Get latest plugin FS API download URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool|number $plugin_id
     *
     * @return string
     */
    private function get_latest_download_api_url($plugin_id = \false)
    {
    }
    /**
     * Get payment invoice URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     *
     * @param bool|number $payment_id
     *
     * @return string
     */
    function _get_invoice_api_url($payment_id = \false)
    {
    }
    /**
     * Get latest plugin download link.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string      $label
     * @param bool|number $plugin_id
     *
     * @return string
     */
    private function get_latest_download_link($label, $plugin_id = \false)
    {
    }
    /**
     * Get latest plugin download local URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool|number $plugin_id
     *
     * @return string
     */
    function _get_latest_download_local_url($plugin_id = \false)
    {
    }
    #endregion Download Plugin ------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @uses   FS_Api
     *
     * @param bool        $background Hints the method if it's a background updates check. If false, it means that
     *                                was initiated by the admin.
     * @param bool|number $plugin_id
     * @param bool        $flush      Since 1.1.7.3
     * @param int         $expiration Since 1.2.2.7
     * @param bool|string $newer_than Since 2.2.1
     */
    private function check_updates($background = \false, $plugin_id = \false, $flush = \true, $expiration = \FS_Plugin_Updater::UPDATES_CHECK_CACHE_EXPIRATION, $newer_than = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool $flush Since 1.1.7.3 add 24 hour cache by default.
     *
     * @return FS_Plugin[]
     *
     * @uses   FS_Api
     */
    private function sync_addons($flush = \false)
    {
    }
    /**
     * Handle user email update.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     * @uses   FS_Api
     *
     * @param string $new_email
     *
     * @return object
     */
    private function update_email($new_email)
    {
    }
    #----------------------------------------------------------------------------------
    #region API Error Handling
    #----------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     *
     * @param mixed $result
     *
     * @return bool Is API result contains an error.
     */
    private function is_api_error($result)
    {
    }
    /**
     * Checks if given API result is a non-empty and not an error object.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed       $result
     * @param string|null $required_property Optional property we want to verify that is set.
     *
     * @return bool
     */
    function is_api_result_object($result, $required_property = \null)
    {
    }
    /**
     * Checks if given API result is a non-empty entity object with non-empty ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $result
     *
     * @return bool
     */
    private function is_api_result_entity($result)
    {
    }
    #endregion
    /**
     * Make sure a given argument is an array of a specific type.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed  $array
     * @param string $class
     *
     * @return bool
     */
    private function is_array_instanceof($array, $class)
    {
    }
    /**
     * Start install ownership change.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     * @uses   FS_Api
     *
     * @param string $candidate_email
     * @param string $transfer_type
     *
     * @return bool Is ownership change successfully initiated.
     */
    private function init_change_owner($candidate_email, $transfer_type)
    {
    }
    /**
     * Handle install ownership change.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     * @uses   FS_Api
     *
     * @return bool Was ownership change successfully complete.
     */
    private function complete_change_owner()
    {
    }
    /**
     * Completes ownership change by license.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.3.2
     *
     * @param number              $user_id
     * @param array[string]number $install_ids_by_slug_map
     *
     */
    private function complete_ownership_change_by_license($user_id, $install_ids_by_slug_map)
    {
    }
    /**
     * Handle user name update.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     * @uses   FS_Api
     *
     * @return object
     */
    private function update_user_name()
    {
    }
    /**
     * Verify user email.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     * @uses   FS_Api
     */
    private function verify_email()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.2
     *
     * @param array     $params
     * @param bool|null $network
     *
     * @return string
     */
    function get_activation_url($params = array(), $network = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param array $params
     *
     * @return string
     */
    function get_reconnect_url($params = array())
    {
    }
    /**
     * Get the URL of the page that should be loaded after the user connect
     * or skip in the opt-in screen.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string    $filter Filter name.
     * @param array     $params Since 1.2.2.7
     * @param bool|null $network
     *
     * @return string
     */
    function get_after_activation_url($filter, $params = array(), $network = \null)
    {
    }
    /**
     * Handle account page updates / edits / actions.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     */
    private function _handle_account_edits()
    {
    }
    /**
     * Adds CSS classes for the body tag in the admin.
     *
     * @param string $classes Space-separated string of class names.
     * 
     * @return string $classes FS Admin body tag class names.
     */
    public function fs_addons_body_class($classes)
    {
    }
    /**
     * Account page resources load.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function _account_page_load()
    {
    }
    /**
     * Renders the "Affiliation" page.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     */
    function _affiliation_page_render()
    {
    }
    /**
     * Render account page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     */
    function _account_page_render()
    {
    }
    /**
     * Render account connect page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _connect_page_render()
    {
    }
    /**
     * Load required resources before add-ons page render.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function _addons_page_load()
    {
    }
    /**
     * Render add-ons page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function _addons_page_render()
    {
    }
    /* Pricing & Upgrade
       ------------------------------------------------------------------------------------------------------------------*/
    /**
     * Render pricing page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     */
    function _pricing_page_render()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.1
     */
    function _maybe_add_pricing_ajax_handler()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     */
    function _fs_pricing_ajax_action_handler()
    {
    }
    #----------------------------------------------------------------------------------
    #region Contact Us
    #----------------------------------------------------------------------------------
    /**
     * Render contact-us page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    function _contact_page_render()
    {
    }
    #endregion ------------------------------------------------------------------------
    /**
     * Hide all admin notices to prevent distractions.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @uses   remove_all_actions()
     */
    private static function _hide_admin_notices()
    {
    }
    static function _clean_admin_content_section_hook()
    {
    }
    /**
     * Attach to admin_head hook to hide all admin notices.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    static function _clean_admin_content_section()
    {
    }
    /* CSS & JavaScript
       ------------------------------------------------------------------------------------------------------------------*/
    /*		function _enqueue_script($handle, $src) {
                        $url = plugins_url( substr( WP_FS__DIR_JS, strlen( $this->_plugin_dir_path ) ) . '/assets/js/' . $src );
    
                        $this->_logger->entrance( 'script = ' . $url );
    
                        wp_enqueue_script( $handle, $url );
                    }*/
    /* SDK
       ------------------------------------------------------------------------------------------------------------------*/
    private $_user_api;
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @param bool $flush
     *
     * @return FS_Api
     */
    function get_api_user_scope($flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_User $user
     *
     * @return \FS_Api
     */
    private function get_api_user_scope_by_user(\FS_User $user)
    {
    }
    /**
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param bool $flush
     *
     * @return FS_Api
     */
    private function get_current_or_network_user_api_scope($flush = \false)
    {
    }
    private $_site_api;
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @param bool $flush
     *
     * @return FS_Api
     */
    private function get_api_site_scope($flush = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param string $path
     * @param string $method
     * @param array  $params
     * @param bool   $flush_instance
     *
     * @return array|mixed|string|void
     * @throws Freemius_Exception
     */
    private function api_site_call($path, $method = 'GET', $params = array(), $flush_instance = \false)
    {
    }
    private $_plugin_api;
    /**
     * Get plugin public API scope.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return FS_Api
     */
    function get_api_plugin_scope()
    {
    }
    /**
     * Get bundle public API scope.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return FS_Api
     */
    function get_api_bundle_scope()
    {
    }
    /**
     * Get site API scope object (fallback to public plugin scope when not registered).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return FS_Api
     */
    function get_api_site_or_plugin_scope()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.3.1
     *
     * @param object $result
     */
    private function maybe_modify_api_curl_error_message($result)
    {
    }
    /**
     * Show trial promotional notice (if any trial exist).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_Plugin_Plan[] $plans
     */
    function _check_for_trial_plans($plans)
    {
    }
    /**
     * During trial promotion the "upgrade" submenu item turns to
     * "start trial" to encourage the trial. Since we want to keep
     * the same menu item handler and there's no robust way to
     * add new arguments to the menu item link's querystring,
     * use JavaScript to find the menu item and update the href of
     * the link.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     */
    function _fix_start_trial_menu_item_url()
    {
    }
    /**
     * Check if module is currently in a trial promotion mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    function is_in_trial_promotion()
    {
    }
    /**
     * Show trial promotional notice (if any trial exist).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool If trial notice added.
     */
    function _add_trial_notice()
    {
    }
    /**
     * Lets users/customers know that the product has an affiliate program.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2.11
     *
     * @return bool Returns true if the notice has been added.
     */
    function _add_affiliate_program_notice()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     */
    function _enqueue_common_css()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     */
    function _show_theme_activation_optin_dialog()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     */
    function _add_fs_theme_activation_dialog()
    {
    }
    /* Action Links
       ------------------------------------------------------------------------------------------------------------------*/
    private $_action_links_hooked = \false;
    private $_action_links = array();
    /**
     * Hook to plugin action links filter.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     */
    private function hook_plugin_action_links()
    {
    }
    /**
     * Add plugin action link.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param      $label
     * @param      $url
     * @param bool $external
     * @param int  $priority
     * @param bool $key
     */
    function add_plugin_action_link($label, $url, $external = \false, $priority = \WP_FS__DEFAULT_PRIORITY, $key = \false)
    {
    }
    /**
     * Adds Upgrade and Add-Ons links to the main Plugins page link actions collection.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     */
    function _add_upgrade_action_link()
    {
    }
    /**
     * Adds "Activate License" or "Change License" link to the main Plugins page link actions collection.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.1.9
     */
    function _add_license_action_link()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.2
     */
    function _add_premium_version_upgrade_selection_action()
    {
    }
    /**
     * Adds "Opt In" or "Opt Out" link to the main "Plugins" page link actions collection.
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.1.5
     */
    function _add_tracking_links()
    {
    }
    /**
     * Get the URL of the page that should be loaded right after the plugin activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.4
     *
     * @return string
     */
    function get_after_plugin_activation_redirect_url()
    {
    }
    /**
     * Forward page to activation page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    function _redirect_on_activation_hook()
    {
    }
    /**
     * Modify plugin's page action links collection.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param array $links
     * @param       $file
     *
     * @return array
     */
    function _modify_plugin_action_links_hook($links, $file)
    {
    }
    /**
     * Adds admin message.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $message
     * @param string $title
     * @param string $type
     */
    function add_admin_message($message, $title = '', $type = 'success')
    {
    }
    /**
     * Adds sticky admin message.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.0
     *
     * @param string $message
     * @param string $id
     * @param string $title
     * @param string $type
     */
    function add_sticky_admin_message($message, $id, $title = '', $type = 'success')
    {
    }
    /**
     * Check if the paid version of the module is installed.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.0
     *
     * @return bool
     */
    private function is_premium_version_installed()
    {
    }
    /**
     * Helper function that returns the final steps for the upgrade completion.
     *
     * If the module is already running the premium code, returns an empty string.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param string $plan_title
     *
     * @return string
     */
    private function get_complete_upgrade_instructions($plan_title = '')
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.3
     *
     * @param string $message_before_the_instructions
     * @param string $message_id
     * @param string $plan_title
     */
    private function add_complete_upgrade_instructions_notice($message_before_the_instructions, $message_id, $plan_title = '')
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.3
     *
     * @param bool $is_upgrade
     */
    private function add_after_plan_activation_or_upgrade_instructions_notice($is_upgrade = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.0
     *
     * @param string $url
     * @param array  $request
     */
    private static function enrich_request_for_debug(&$url, &$request)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.0
     *
     * @param string      $url
     * @param array       $request
     * @param int         $success_cache_expiration
     * @param int         $failure_cache_expiration
     * @param bool        $maybe_enrich_request_for_debug
     *
     * @return WP_Error|array
     */
    static function safe_remote_post(&$url, $request, $success_cache_expiration = 0, $failure_cache_expiration = 0, $maybe_enrich_request_for_debug = \true)
    {
    }
    /**
     * This method is used to enrich the after upgrade notice instructions when the upgraded
     * license cannot be activated network wide (license quota isn't large enough).
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    private function get_license_network_activation_notice()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param string $key
     *
     * @return string
     */
    function get_text($key)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.3
     *
     * @param string $text Translatable string.
     * @param string $key  String key for overrides.
     *
     * @return string
     */
    function get_text_inline($text, $key = '')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.3
     *
     * @param string $text    Translatable string.
     * @param string $context Context information for the translators.
     * @param string $key     String key for overrides.
     *
     * @return string
     */
    function get_text_x_inline($text, $context, $key)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.3
     *
     * @param string $text Translatable string.
     * @param string $key  String key for overrides.
     *
     * @return string
     */
    function esc_html_inline($text, $key)
    {
    }
    #----------------------------------------------------------------------------------
    #region Versioning
    #----------------------------------------------------------------------------------
    /**
     * Check if Freemius in SDK upgrade mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_sdk_upgrade_mode()
    {
    }
    /**
     * Turn SDK upgrade mode off.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function set_sdk_upgrade_complete()
    {
    }
    /**
     * Check if plugin upgrade mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_plugin_upgrade_mode()
    {
    }
    /**
     * Turn plugin upgrade mode off.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function set_plugin_upgrade_complete()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Permissions
    #----------------------------------------------------------------------------------
    /**
     * Check if specific permission requested.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $permission
     *
     * @return bool
     */
    function is_permission_requested($permission)
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Auto Activation
    #----------------------------------------------------------------------------------
    /**
     * Hints the SDK if running an auto-installation.
     *
     * @var bool
     */
    private $_isAutoInstall = \false;
    /**
     * After upgrade callback to install and auto activate a plugin.
     * This code will only be executed on explicit request from the user,
     * following the practice Jetpack are using with their theme installations.
     *
     * @link   https://make.wordpress.org/plugins/2017/03/16/clarification-of-guideline-8-executable-code-and-installs/
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     */
    function _install_premium_version_ajax_action()
    {
    }
    /**
     * Displays module activation dialog box after a successful upgrade
     * where the user explicitly requested to auto download and install
     * the premium version.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     */
    function _add_auto_installation_dialog_box()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Tabs Integration
    #--------------------------------------------------------------------------------
    #region Module's Original Tabs
    /**
     * Inject a JavaScript logic to capture the theme tabs HTML.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     */
    function _tabs_capture()
    {
    }
    /**
     * Cache theme's tabs HTML for a week. The cache will also be set as expired
     * after version and type (free/premium) changes, in addition to the week period.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     */
    function _store_tabs_ajax_action()
    {
    }
    /**
     * Cache theme's settings page custom styles. The cache will also be set as expired
     * after version and type (free/premium) changes, in addition to the week period.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     */
    function _store_tabs_styles()
    {
    }
    /**
     * Check if module's original settings page has any tabs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    private function has_tabs()
    {
    }
    /**
     * Get module's settings page HTML content, starting
     * from the beginning of the <div class="wrap"> element,
     * until the tabs HTML (including).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return string
     */
    private function get_tabs_html()
    {
    }
    /**
     * Check if page should include tabs.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool
     */
    private function should_page_include_tabs()
    {
    }
    /**
     * Add the tabs HTML before the setting's page content and
     * enqueue any required stylesheets.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool If tabs were included.
     */
    function _add_tabs_before_content()
    {
    }
    /**
     * Add the tabs closing HTML after the setting's page content.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return bool If tabs closing HTML was included.
     */
    function _add_tabs_after_content()
    {
    }
    #endregion
    /**
     * Add in-page JavaScript to inject the Freemius tabs into
     * the module's setting tabs section.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     */
    function _add_freemius_tabs()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Customizer Integration for Themes
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param WP_Customize_Manager $customizer
     */
    function _customizer_register($customizer)
    {
    }
    #endregion
    /**
     * If the theme has a paid version, add some custom
     * styling to the theme's premium version (if exists)
     * to highlight that it's the premium version of the
     * same theme, making it easier for identification
     * after the user upgrades and upload it to the site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     */
    function _style_premium_theme()
    {
    }
    /**
     * This method will return the absolute URL of the module's local icon.
     *
     * When you are running your plugin or theme on a **localhost** environment, if the icon
     * is not found in the local assets folder, try to fetch the icon URL from Freemius. If not set and
     * it's a plugin hosted on WordPress.org, try fetching the icon URL from wordpress.org.
     * If an icon is found, this method will automatically attempt to download the icon and store it
     * in /freemius/assets/img/{slug}.{png|jpg|gif|svg}.
     *
     * It's important to mention that this method is NOT phoning home since the developer will deploy
     * the product with the local icon in the assets folder. The download process just simplifies
     * the process for the developer.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function get_local_icon_url()
    {
    }
    /**
     * Fetch module's extended info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return object|mixed
     */
    private function fetch_module_info()
    {
    }
    /**
     * Fetch module's remote icon URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function fetch_remote_icon_url()
    {
    }
    #--------------------------------------------------------------------------------
    #region GDPR
    #--------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     *
     * @param array $user_plugins
     *
     * @return string
     */
    private function get_gdpr_admin_notice_string($user_plugins)
    {
    }
    /**
     * This method is called for opted-in users to fetch the is_marketing_allowed flag of the user for all the
     * plugins and themes they've opted in to.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.1.0
     *
     * @param string      $user_email
     * @param string      $license_key
     * @param array       $plugin_ids
     * @param string|null $license_key
     *
     * @return array|false
     */
    private function fetch_user_marketing_flag_status_by_plugins($user_email, $license_key, $plugin_ids)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    function _maybe_show_gdpr_admin_notice()
    {
    }
    /**
     * Prevents the GDPR opt-in admin notice from being added if the user has already chosen to allow or not allow
     * marketing.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    private function disable_opt_in_notice_and_lock_user()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.4
     */
    static function _add_api_connectivity_notice_handler_js()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    function _add_gdpr_optin_js()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    function enqueue_gdpr_optin_notice_style()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    function _maybe_add_gdpr_optin_ajax_handler()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.0
     */
    function _fetch_is_marketing_required_flag_value_ajax_action()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.2
     *
     * @param number[] $install_ids
     *
     * @return array {
     *      An array of objects containing the installs' licenses owners data.
     *
     *      @property number $id User ID.
     *      @property string $email User email (can be masked email).
     * }
     */
    private function fetch_installs_licenses_owners_data($install_ids)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    private function add_gdpr_optin_ajax_handler_and_style()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    function _gdpr_optin_ajax_action()
    {
    }
    /**
     * Checks if the GDPR admin notice should be handled. By default, this logic is off, unless the integrator adds the special 'handle_gdpr_admin_notice' filter.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return bool
     */
    private function should_handle_gdpr_admin_notice()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Marketing
    #----------------------------------------------------------------------------------
    /**
     * Check if current user purchased any other plugins before.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function has_purchased_before()
    {
    }
    /**
     * Check if current user classified as an agency.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_agency()
    {
    }
    /**
     * Check if current user classified as a developer.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_developer()
    {
    }
    /**
     * Check if current user classified as a business.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_business()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Helper
    #----------------------------------------------------------------------------------
    /**
     * If running with a secret key, assume it's the developer and show pending plans as well.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.2
     *
     * @param string $path
     *
     * @return string
     */
    function add_show_pending($path)
    {
    }
    #endregion
}
/**
 * WP Admin notices manager both for site level and network level.
 *
 * Class FS_Admin_Notices
 */
class FS_Admin_Notices
{
    /**
     * @since 1.2.2
     *
     * @var string
     */
    protected $_module_unique_affix;
    /**
     * @var string
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_title;
    /**
     * @var FS_Admin_Notice_Manager
     */
    protected $_notices;
    /**
     * @var FS_Admin_Notice_Manager
     */
    protected $_network_notices;
    /**
     * @var int The ID of the blog that is associated with the current site level options.
     */
    private $_blog_id = 0;
    /**
     * @var bool
     */
    private $_is_multisite;
    /**
     * @var FS_Admin_Notices[]
     */
    private static $_instances = array();
    /**
     * @param string $id
     * @param string $title
     * @param string $module_unique_affix
     * @param bool   $is_network_and_blog_admins Whether or not the message should be shown both on network and
     *                                           blog admin pages.
     *
     * @return FS_Admin_Notices
     */
    static function instance($id, $title = '', $module_unique_affix = '', $is_network_and_blog_admins = \false)
    {
    }
    /**
     * @param string $id
     * @param string $title
     * @param string $module_unique_affix
     * @param bool   $is_network_and_blog_admins Whether or not the message should be shown both on network and
     *                                           blog admin pages.
     */
    protected function __construct($id, $title = '', $module_unique_affix = '', $is_network_and_blog_admins = \false)
    {
    }
    /**
     * Add admin message to admin messages queue, and hook to admin_notices / all_admin_notices if not yet hooked.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string   $message
     * @param string   $title
     * @param string   $type
     * @param bool     $is_sticky
     * @param string   $id Message ID
     * @param bool     $store_if_sticky
     * @param int|null $network_level_or_blog_id
     *
     * @uses   add_action()
     */
    function add($message, $title = '', $type = 'success', $is_sticky = \false, $id = '', $store_if_sticky = \true, $network_level_or_blog_id = \null, $is_dimissible = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string|string[] $ids
     * @param int|null        $network_level_or_blog_id
     * @param bool            $store
     */
    function remove_sticky($ids, $network_level_or_blog_id = \null, $store = \true)
    {
    }
    /**
     * Check if sticky message exists by id.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param string   $id
     * @param int|null $network_level_or_blog_id
     *
     * @return bool
     */
    function has_sticky($id, $network_level_or_blog_id = \null)
    {
    }
    /**
     * Adds sticky admin notification.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string      $message
     * @param string      $id Message ID
     * @param string      $title
     * @param string      $type
     * @param int|null    $network_level_or_blog_id
     * @param number|null $wp_user_id
     * @param string|null $plugin_title
     * @param bool        $is_network_and_blog_admins Whether or not the message should be shown both on network and
     *                                                blog admin pages.
     * @param bool        $is_dismissible
     */
    function add_sticky($message, $id, $title = '', $type = 'success', $network_level_or_blog_id = \null, $wp_user_id = \null, $plugin_title = \null, $is_network_and_blog_admins = \false, $is_dismissible = \true, $data = array())
    {
    }
    /**
     * Retrieves the data of a sticky notice.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.4.3
     *
     * @param string   $id
     * @param int|null $network_level_or_blog_id
     *
     * @return array|null
     */
    function get_sticky($id, $network_level_or_blog_id)
    {
    }
    /**
     * Clear all sticky messages.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int|null $network_level_or_blog_id
     * @param bool     $is_temporary
     */
    function clear_all_sticky($network_level_or_blog_id = \null, $is_temporary = \false)
    {
    }
    /**
     * Add admin message to all admin messages queue, and hook to all_admin_notices if not yet hooked.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $message
     * @param string $title
     * @param string $type
     * @param bool   $is_sticky
     * @param string $id Message ID
     */
    function add_all($message, $title = '', $type = 'success', $is_sticky = \false, $id = '')
    {
    }
    #--------------------------------------------------------------------------------
    #region Helper Methods
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return FS_Admin_Notice_Manager
     */
    private function get_site_notices($blog_id = 0)
    {
    }
    /**
     * Check if the network notices should be used.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string        $id
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite notices (if there's a network). When `false`, use the current context blog notices. When `null`, the decision which notices manager to use (MS vs. Current S) will be handled internally and determined based on the $id and the context admin (blog admin vs. network level admin).
     *
     * @return bool
     */
    private function should_use_network_notices($id = '', $network_level_or_blog_id = \null)
    {
    }
    /**
     * Retrieves an instance of FS_Admin_Notice_Manager.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param string   $id
     * @param int|null $network_level_or_blog_id
     *
     * @return FS_Admin_Notice_Manager
     */
    private function get_site_or_network_notices($id, $network_level_or_blog_id)
    {
    }
    #endregion
}
/**
 * Class FS_Api
 *
 * Wraps Freemius API SDK to handle:
 *      1. Clock sync.
 *      2. Fallback to HTTP when HTTPS fails.
 *      3. Adds caching layer to GET requests.
 *      4. Adds consistency for failed requests by using last cached version.
 */
class FS_Api
{
    /**
     * @var FS_Api[]
     */
    private static $_instances = array();
    /**
     * @var FS_Option_Manager Freemius options, options-manager.
     */
    private static $_options;
    /**
     * @var FS_Cache_Manager API Caching layer
     */
    private static $_cache;
    /**
     * @var int Clock diff in seconds between current server to API server.
     */
    private static $_clock_diff;
    /**
     * @var Freemius_Api_WordPress
     */
    private $_api;
    /**
     * @var string
     */
    private $_slug;
    /**
     * @var FS_Logger
     * @since 1.0.4
     */
    private $_logger;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string
     */
    private $_sdk_version;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @var string
     */
    private $_url;
    /**
     * @param string      $slug
     * @param string      $scope      'app', 'developer', 'user' or 'install'.
     * @param number      $id         Element's id.
     * @param string      $public_key Public key.
     * @param bool        $is_sandbox
     * @param bool|string $secret_key Element's secret key.
     * @param null|string $sdk_version
     * @param null|string $url
     *
     * @return FS_Api
     */
    static function instance($slug, $scope, $id, $public_key, $is_sandbox, $secret_key = \false, $sdk_version = \null, $url = \null)
    {
    }
    private static function _init()
    {
    }
    /**
     * @param string      $slug
     * @param string      $scope      'app', 'developer', 'user' or 'install'.
     * @param number      $id         Element's id.
     * @param string      $public_key Public key.
     * @param bool|string $secret_key Element's secret key.
     * @param bool        $is_sandbox
     * @param null|string $sdk_version
     * @param null|string $url
     */
    private function __construct($slug, $scope, $id, $public_key, $secret_key, $is_sandbox, $sdk_version, $url)
    {
    }
    /**
     * Find clock diff between server and API server, and store the diff locally.
     *
     * @param bool|int $diff
     *
     * @return bool|int False if clock diff didn't change, otherwise returns the clock diff in seconds.
     */
    private function _sync_clock_diff($diff = \false)
    {
    }
    /**
     * Override API call to enable retry with servers' clock auto sync method.
     *
     * @param string $path
     * @param string $method
     * @param array  $params
     * @param bool   $in_retry Is in retry or first call attempt.
     *
     * @return array|mixed|string|void
     */
    private function _call($path, $method = 'GET', $params = array(), $in_retry = \false)
    {
    }
    /**
     * Override API call to wrap it in servers' clock sync method.
     *
     * @param string $path
     * @param string $method
     * @param array  $params
     *
     * @return array|mixed|string|void
     * @throws Freemius_Exception
     */
    function call($path, $method = 'GET', $params = array())
    {
    }
    /**
     * Get API request URL signed via query string.
     *
     * @param string $path
     *
     * @return string
     */
    function get_signed_url($path)
    {
    }
    /**
     * @param string $path
     * @param bool   $flush
     * @param int    $expiration (optional) Time until expiration in seconds from now, defaults to 24 hours
     *
     * @return stdClass|mixed
     */
    function get($path = '/', $flush = \false, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC)
    {
    }
    /**
     * @todo Remove this method after migrating Freemius::safe_remote_post() to FS_Api::call().
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param string $url
     * @param array  $remote_args
     *
     * @return array|WP_Error The response array or a WP_Error on failure.
     */
    static function remote_request($url, $remote_args)
    {
    }
    /**
     * Check if there's a cached version of the API request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @param string $path
     * @param string $method
     * @param array  $params
     *
     * @return bool
     */
    function is_cached($path, $method = 'GET', $params = array())
    {
    }
    /**
     * Invalidate a cached version of the API request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param string $path
     * @param string $method
     * @param array  $params
     */
    function purge_cache($path, $method = 'GET', $params = array())
    {
    }
    /**
     * Invalidate a cached version of the API request.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $path
     * @param int    $expiration
     * @param string $method
     * @param array  $params
     */
    function update_cache_expiration($path, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC, $method = 'GET', $params = array())
    {
    }
    /**
     * @param string $path
     * @param string $method
     * @param array  $params
     *
     * @return string
     * @throws \Freemius_Exception
     */
    private function get_cache_key($path, $method = 'GET', $params = array())
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param bool $is_http
     */
    private function toggle_force_http($is_http)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param mixed $response
     *
     * @return bool
     */
    static function is_blocked($response)
    {
    }
    /**
     * Check if API is temporary down.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @return bool
     */
    static function is_temporary_down()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @return object
     */
    private function get_temporary_unavailable_error()
    {
    }
    /**
     * Check if based on the API result we should try
     * to re-run the same request with HTTP instead of HTTPS.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param $result
     *
     * @return bool
     */
    private static function should_try_with_http($result)
    {
    }
    function get_url($path = '')
    {
    }
    /**
     * Clear API cache.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    static function clear_cache()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.5.4
     */
    static function clear_force_http_flag()
    {
    }
    #----------------------------------------------------------------------------------
    #region Error Handling
    #----------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $result
     *
     * @return bool Is API result contains an error.
     */
    static function is_api_error($result)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param mixed $result
     * @param bool  $ignore_message
     *
     * @return bool Is API result contains an error.
     */
    static function is_api_error_object($result, $ignore_message = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.4
     *
     * @param WP_Error|object|string $response
     *
     * @return bool
     */
    static function is_ssl_error_response($response)
    {
    }
    /**
     * Checks if given API result is a non-empty and not an error object.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed       $result
     * @param string|null $required_property Optional property we want to verify that is set.
     *
     * @return bool
     */
    static function is_api_result_object($result, $required_property = \null)
    {
    }
    /**
     * Checks if given API result is a non-empty entity object with non-empty ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $result
     *
     * @return bool
     */
    static function is_api_result_entity($result)
    {
    }
    /**
     * Get API result error code. If failed to get code, returns an empty string.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param mixed $result
     *
     * @return string
     */
    static function get_error_code($result)
    {
    }
    #endregion
}
interface FS_I_Garbage_Collector
{
    function clean();
}
class FS_Product_Garbage_Collector implements \FS_I_Garbage_Collector
{
    /**
     * @var FS_Options
     */
    private $_accounts;
    /**
     * @var string[]
     */
    private $_options_names;
    /**
     * @var string
     */
    private $_type;
    /**
     * @var string
     */
    private $_plural_type;
    /**
     * @var array<string, int> Map of product slugs to their last load timestamp, only for products that are not active.
     */
    private $_gc_timestamp;
    /**
     * @var array<string, array<string, mixed>> Map of product slugs to their data, as stored by the primary storage of `Freemius` class.
     */
    private $_storage_data;
    function __construct(\FS_Options $_accounts, $option_names, $type)
    {
    }
    function clean()
    {
    }
    private function get_all_option_names()
    {
    }
    private function get_products()
    {
    }
    private function get_filtered_products()
    {
    }
    /**
     * @param string $slug
     *
     * @return bool
     */
    private function is_product_active($slug)
    {
    }
    private function load_options()
    {
    }
    /**
     * Updates the garbage collector timestamp, only if it was not already set by the product's primary storage.
     *
     * @param array $products
     *
     * @return void
     */
    private function update_gc_timestamp($products)
    {
    }
    private function get_last_load_timestamp($slug)
    {
    }
}
class FS_User_Garbage_Collector implements \FS_I_Garbage_Collector
{
    private $_accounts;
    private $_types;
    function __construct(\FS_Options $_accounts, array $types)
    {
    }
    function clean()
    {
    }
    private function get_user_has_install_map()
    {
    }
}
// Main entry-level class.
class FS_Garbage_Collector implements \FS_I_Garbage_Collector
{
    /**
     * @var FS_Garbage_Collector
     * @since 2.6.0
     */
    private static $_instance;
    /**
     * @return FS_Garbage_Collector
     */
    static function instance()
    {
    }
    #endregion
    private function __construct()
    {
    }
    function clean()
    {
    }
    /**
     * @param FS_Options $_accounts
     *
     * @return FS_I_Garbage_Collector[]
     */
    private function get_product_cleaners(\FS_Options $_accounts)
    {
    }
}
/**
 * Class FS_Lock
 *
 * @author Vova Feldman (@svovaf)
 * @since  2.5.1
 */
class FS_Lock
{
    /**
     * @var int Random ID representing the current PHP thread.
     */
    private static $_thread_id;
    /**
     * @var string
     */
    private $_lock_id;
    /**
     * @param string $lock_id
     */
    function __construct($lock_id)
    {
    }
    /**
     * Try to acquire lock. If the lock is already set or is being acquired by another locker, don't do anything.
     *
     * @param int $expiration
     *
     * @return bool TRUE if successfully acquired lock.
     */
    function try_lock($expiration = 0)
    {
    }
    /**
     * Acquire lock regardless if it's already acquired by another locker or not.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @param int $expiration
     */
    function lock($expiration = 0)
    {
    }
    /**
     * Checks if lock is currently acquired.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return bool
     */
    function is_locked()
    {
    }
    /**
     * Unlock the lock.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     */
    function unlock()
    {
    }
    /**
     * Checks if lock is currently acquired by the current locker.
     *
     * @return bool
     */
    protected function has_lock()
    {
    }
}
class FS_Logger
{
    private $_id;
    private $_on = \false;
    private $_echo = \false;
    private $_file_start = 0;
    /**
     * @var int PHP Process ID.
     */
    private static $_processID;
    /**
     * @var string PHP Script user name.
     */
    private static $_ownerName;
    /**
     * @var bool Is storage logging turned on.
     */
    private static $_isStorageLoggingOn;
    /**
     * @var int ABSPATH length.
     */
    private static $_abspathLength;
    private static $LOGGERS = array();
    private static $LOG = array();
    private static $CNT = 0;
    private static $_HOOKED_FOOTER = \false;
    private function __construct($id, $on = \false, $echo = \false)
    {
    }
    /**
     * @param string $id
     * @param bool   $on
     * @param bool   $echo
     *
     * @return FS_Logger
     */
    public static function get_logger($id, $on = \false, $echo = \false)
    {
    }
    /**
     * Initialize logging global info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     */
    private static function init()
    {
    }
    private static function hook_footer()
    {
    }
    function is_on()
    {
    }
    function on()
    {
    }
    function echo_on()
    {
    }
    function is_echo_on()
    {
    }
    function get_id()
    {
    }
    function get_file()
    {
    }
    private function _log(&$message, $type, $wrapper = \false)
    {
    }
    function log($message, $wrapper = \false)
    {
    }
    function info($message, $wrapper = \false)
    {
    }
    function warn($message, $wrapper = \false)
    {
    }
    function error($message, $wrapper = \false)
    {
    }
    /**
     * Log API error.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param mixed $api_result
     * @param bool  $wrapper
     */
    function api_error($api_result, $wrapper = \false)
    {
    }
    function entrance($message = '', $wrapper = \false)
    {
    }
    function departure($message = '', $wrapper = \false)
    {
    }
    #--------------------------------------------------------------------------------
    #region Log Formatting
    #--------------------------------------------------------------------------------
    private static function format($log, $show_type = \true)
    {
    }
    private static function format_html($log)
    {
    }
    #endregion
    static function dump()
    {
    }
    static function get_log()
    {
    }
    #--------------------------------------------------------------------------------
    #region Database Logging
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @return bool
     */
    public static function is_storage_logging_on()
    {
    }
    /**
     * Turns on/off database persistent debugging to capture
     * multi-session logs to debug complex flows like
     * plugin auto-deactivate on premium version activation.
     *
     * @todo   Check if Theme Check has issues with DB tables for themes.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param bool $is_on
     *
     * @return bool
     */
    public static function _set_storage_logging($is_on = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param string $type
     * @param string $message
     * @param int    $log_order
     * @param array  $caller
     *
     * @return false|int
     */
    private function db_log(&$type, &$message, &$log_order, &$caller)
    {
    }
    /**
     * Persistent DB logger columns.
     *
     * @var array
     */
    private static $_log_columns = array('id', 'process_id', 'user_name', 'logger', 'log_order', 'type', 'message', 'file', 'line', 'function', 'request_type', 'request_url', 'created');
    /**
     * Create DB logs query.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param bool $filters
     * @param int  $limit
     * @param int  $offset
     * @param bool $order
     * @param bool $escape_eol
     *
     * @return string
     */
    private static function build_db_logs_query($filters = \false, $limit = 200, $offset = 0, $order = \false, $escape_eol = \false)
    {
    }
    /**
     * Load logs from DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param bool $filters
     * @param int  $limit
     * @param int  $offset
     * @param bool $order
     *
     * @return object[]|null
     */
    public static function load_db_logs($filters = \false, $limit = 200, $offset = 0, $order = \false)
    {
    }
    /**
     * Load logs from DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param bool   $filters
     * @param string $filename
     * @param int    $limit
     * @param int    $offset
     * @param bool   $order
     *
     * @return false|string File download URL or false on failure.
     */
    public static function download_db_logs($filters = \false, $filename = '', $limit = 10000, $offset = 0, $order = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param string $filename
     *
     * @return string
     */
    public static function get_logs_download_url($filename = '')
    {
    }
    #endregion
}
/**
 * Class FS_Options
 *
 * A wrapper class for handling network level and single site level options.
 */
class FS_Options
{
    /**
     * @var string
     */
    private $_id;
    /**
     * @var array[string]FS_Options {
     * @key   string
     * @value FS_Options
     * }
     */
    private static $_instances;
    /**
     * @var FS_Option_Manager Site level options.
     */
    private $_options;
    /**
     * @var FS_Option_Manager Network level options.
     */
    private $_network_options;
    /**
     * @var int The ID of the blog that is associated with the current site level options.
     */
    private $_blog_id = 0;
    /**
     * @var bool
     */
    private $_is_multisite;
    /**
     * @var string[] Lazy collection of params on the site level.
     */
    private static $_SITE_OPTIONS_MAP;
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param string $id
     * @param bool   $load
     *
     * @return FS_Options
     */
    static function instance($id, $load = \false)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param string $id
     * @param bool   $load
     */
    private function __construct($id, $load = \false)
    {
    }
    /**
     * Switch the context of the site level options manager.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param $blog_id
     */
    function set_site_blog_context($blog_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string        $option
     * @param mixed         $default
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_SITE_LEVEL_PARAMS).
     *
     * @return mixed
     */
    function get_option($option, $default = \null, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param string        $option
     * @param mixed         $value
     * @param bool          $flush
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_SITE_LEVEL_PARAMS).
     */
    function set_option($option, $value, $flush = \false, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string        $option
     * @param bool          $flush
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_SITE_LEVEL_PARAMS).
     */
    function unset_option($option, $flush = \false, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param bool $flush
     * @param bool $network_level
     */
    function load($flush = \false, $network_level = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.0
     *
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, store both network storage and the current context blog storage.
     */
    function store($network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int|null|bool $network_level_or_blog_id
     * @param bool          $flush
     */
    function clear($network_level_or_blog_id = \null, $flush = \false)
    {
    }
    /**
     * Migration script to the new storage data structure that is network compatible.
     *
     * IMPORTANT:
     *      This method should be executed only after it is determined if this is a network
     *      level compatible product activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     */
    function migrate_to_network($blog_id = 0)
    {
    }
    #--------------------------------------------------------------------------------
    #region Helper Methods
    #--------------------------------------------------------------------------------
    /**
     * We don't want to load the map right away since it's not even needed in a non-MS environment.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private static function load_site_options_map()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $option
     *
     * @return bool
     */
    private function is_site_option($option)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return FS_Option_Manager
     */
    private function get_site_options($blog_id = 0)
    {
    }
    /**
     * Check if an option should be stored on the MS network storage.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string        $option
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_SITE_LEVEL_PARAMS).
     *
     * @return bool
     */
    private function should_use_network_storage($option, $network_level_or_blog_id = \null)
    {
    }
    #endregion
}
class FS_Plugin_Updater
{
    /**
     * @var Freemius
     * @since 1.0.4
     */
    private $_fs;
    /**
     * @var FS_Logger
     * @since 1.0.4
     */
    private $_logger;
    /**
     * @var object
     * @since 1.1.8.1
     */
    private $_update_details;
    /**
     * @var array
     * @since 2.1.2
     */
    private $_translation_updates;
    private static $_upgrade_basename = \null;
    const UPDATES_CHECK_CACHE_EXPIRATION = \WP_FS__TIME_24_HOURS_IN_SEC / 24;
    #--------------------------------------------------------------------------------
    #region Singleton
    #--------------------------------------------------------------------------------
    /**
     * @var FS_Plugin_Updater[]
     * @since 2.0.0
     */
    private static $_INSTANCES = array();
    /**
     * @param Freemius $freemius
     *
     * @return FS_Plugin_Updater
     */
    static function instance(\Freemius $freemius)
    {
    }
    #endregion
    private function __construct(\Freemius $freemius)
    {
    }
    /**
     * Initiate required filters.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     */
    private function filters()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.4
     */
    function catch_plugin_information_dialog_contents()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.4
     *
     * @param string $hook_suffix
     */
    function edit_and_echo_plugin_information_dialog_contents($hook_suffix)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private function add_transient_filters()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private function remove_transient_filters()
    {
    }
    /**
     * Capture plugin update row by turning output buffering.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     */
    function catch_plugin_update_row()
    {
    }
    /**
     * Overrides default update message format with "renew your license" message.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $file
     * @param array  $plugin_data
     */
    function edit_and_echo_plugin_update_row($file, $plugin_data)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.0.2
     *
     * @param array $prepared_themes
     *
     * @return array
     */
    function change_theme_update_info_html($prepared_themes)
    {
    }
    /**
     * Since WP version 3.6, a new security feature was added that denies access to repository with a local ip.
     * During development mode we want to be able updating plugin versions via our localhost repository. This
     * filter white-list all domains including "api.freemius".
     *
     * @link   http://www.emanueletessore.com/wordpress-download-failed-valid-url-provided/
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool   $allow
     * @param string $host
     * @param string $url
     *
     * @return bool
     */
    function http_request_host_is_external_filter($allow, $host, $url)
    {
    }
    /**
     * Check for Updates at the defined API endpoint and modify the update array.
     *
     * This function dives into the update api just when WordPress creates its update array,
     * then adds a custom API call and injects the custom plugin data retrieved from the API.
     * It is reassembled from parts of the native WordPress plugin update code.
     * See wp-includes/update.php line 121 for the original wp_update_plugins() function.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @uses   FS_Api
     *
     * @param object $transient_data Update array build by WordPress.
     *
     * @return object Modified update array with custom plugin data.
     */
    function pre_set_site_transient_update_plugins_filter($transient_data)
    {
    }
    /**
     * Get module's required data for the updates' mechanism.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_Plugin_Tag $new_version
     *
     * @return object
     */
    function get_update_details(\FS_Plugin_Tag $new_version)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param FS_Plugin_Tag $new_version
     *
     * @return bool
     */
    private function is_new_version_premium(\FS_Plugin_Tag $new_version)
    {
    }
    /**
     * Update the updates transient with the module's update information.
     *
     * This method is required for multisite environment.
     * If a module is site activated (not network) and not on the main site,
     * the module will NOT be executed on the network level, therefore, the
     * custom updates logic will not be executed as well, so unless we force
     * the injection of the update into the updates transient, premium updates
     * will not work.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param \FS_Plugin_Tag $new_version
     */
    function set_update_data(\FS_Plugin_Tag $new_version)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.0.2
     */
    function delete_update_data()
    {
    }
    /**
     * Try to fetch plugin's info from .org repository.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param string $action
     * @param object $args
     *
     * @return bool|mixed
     */
    static function _fetch_plugin_info_from_repository($action, $args)
    {
    }
    /**
     * Fetches module translation updates from wordpress.org.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.1.2
     *
     * @param string $module_type
     * @param string $slug
     *
     * @return array|null
     */
    private function fetch_wp_org_module_translation_updates($module_type, $slug)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.1.2
     *
     * @param string $module_type
     * @param string $slug
     *
     * @return array
     */
    private function get_installed_translations($module_type, $slug)
    {
    }
    /**
     * Updates information on the "View version x.x details" page with custom data.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @uses   FS_Api
     *
     * @param object $data
     * @param string $action
     * @param mixed  $args
     *
     * @return object
     */
    function plugins_api_filter($data, $action = '', $args = \null)
    {
    }
    /**
     * @since 2.5.3 If the current WordPress version is a patch of the tested version (e.g., 6.1.2 is a patch of 6.1), then override the tested version with the patch so developers won't need to release a new version just to bump the latest supported WP version.
     *
     * @param string|null $tested_up_to
     *
     * @return string|null
     */
    private static function get_tested_wp_version($tested_up_to)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.7
     *
     * @param number|bool $addon_id
     * @param bool|string $newer_than   Since 2.2.1
     * @param bool|string $fetch_readme Since 2.2.1
     *
     * @return object
     */
    private function get_latest_download_details($addon_id = \false, $newer_than = \false, $fetch_readme = \true)
    {
    }
    /**
     * Checks if a given basename has a matching folder name
     * with the current context plugin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @return bool
     */
    private function is_correct_folder_name()
    {
    }
    /**
     * This is a special after upgrade handler for migrating modules
     * that didn't use the '-premium' suffix folder structure before
     * the migration.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @param bool  $response   Install response.
     * @param array $hook_extra Extra arguments passed to hooked filters.
     * @param array $result     Installation result data.
     *
     * @return bool
     */
    function _maybe_update_folder_name($response, $hook_extra, $result)
    {
    }
    #----------------------------------------------------------------------------------
    #region Auto Activation
    #----------------------------------------------------------------------------------
    /**
     * Installs and active a plugin when explicitly requested that from a 3rd party service.
     *
     * This logic was inspired by the TGMPA GPL licensed library by Thomas Griffin.
     *
     * @link   http://tgmpluginactivation.com/
     *
     * @author Vova Feldman
     * @since  1.2.1.7
     *
     * @link   https://make.wordpress.org/plugins/2017/03/16/clarification-of-guideline-8-executable-code-and-installs/
     *
     * @uses   WP_Filesystem
     * @uses   WP_Error
     * @uses   WP_Upgrader
     * @uses   Plugin_Upgrader
     * @uses   Plugin_Installer_Skin
     * @uses   Plugin_Upgrader_Skin
     *
     * @param number|bool $plugin_id
     *
     * @return array
     */
    function install_and_activate_plugin($plugin_id = \false)
    {
    }
    /**
     * Tries to activate a plugin. If fails, returns the error.
     *
     * @author Vova Feldman
     * @since  1.2.1.7
     *
     * @param string $file_path Path within wp-plugins/ to main plugin file.
     *                          This determines the styling of the output messages.
     *
     * @return bool|WP_Error
     */
    protected function try_activate_plugin($file_path)
    {
    }
    /**
     * Check if a premium module version is already active.
     *
     * @author Vova Feldman
     * @since  1.2.1.7
     *
     * @param number|bool $plugin_id
     *
     * @return bool
     */
    private function is_premium_plugin_active($plugin_id = \false)
    {
    }
    /**
     * Store the basename since it's not always available in the `_maybe_adjust_source_dir` method below.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.2.1
     *
     * @param bool|WP_Error $response   Response.
     * @param array         $hook_extra Extra arguments passed to hooked filters.
     *
     * @return bool|WP_Error
     */
    static function _store_basename_for_source_adjustment($response, $hook_extra)
    {
    }
    /**
     * Adjust the plugin directory name if necessary.
     * Assumes plugin has a folder (not a single file plugin).
     *
     * The final destination directory of a plugin is based on the subdirectory name found in the
     * (un)zipped source. In some cases this subdirectory name is not the same as the expected
     * slug and the plugin will not be recognized as installed. This is fixed by adjusting
     * the temporary unzipped source subdirectory name to the expected plugin slug.
     *
     * @author Vova Feldman
     * @since  1.2.1.7
     * @since  2.2.1 The method was converted to static since when the admin update bulk products via the Updates section, the logic applies the `upgrader_source_selection` filter for every product that is being updated.
     *
     * @param string       $source        Path to upgrade/zip-file-name.tmp/subdirectory/.
     * @param string       $remote_source Path to upgrade/zip-file-name.tmp.
     * @param \WP_Upgrader $upgrader      Instance of the upgrader which installs the plugin.
     *
     * @return string|WP_Error
     */
    static function _maybe_adjust_source_dir($source, $remote_source, $upgrader)
    {
    }
    #endregion
}
/**
 * Class FS_Security
 */
class FS_Security
{
    /**
     * @var FS_Security
     * @since 1.0.3
     */
    private static $_instance;
    /**
     * @var FS_Logger
     * @since 1.0.3
     */
    private static $_logger;
    /**
     * @return \FS_Security
     */
    public static function instance()
    {
    }
    private function __construct()
    {
    }
    /**
     * @param \FS_Scope_Entity $entity
     * @param int              $timestamp
     * @param string           $action
     *
     * @return string
     */
    function get_secure_token(\FS_Scope_Entity $entity, $timestamp, $action = '')
    {
    }
    /**
     * @param \FS_Scope_Entity $entity
     * @param int|bool         $timestamp
     * @param string           $action
     *
     * @return array
     */
    function get_context_params(\FS_Scope_Entity $entity, $timestamp = \false, $action = '')
    {
    }
}
/**
 * Class FS_Storage
 *
 * A wrapper class for handling network level and single site level storage.
 *
 * @property bool        $is_network_activation
 * @property int         $network_install_blog_id
 * @property bool|null   $is_extensions_tracking_allowed
 * @property bool|null   $is_diagnostic_tracking_allowed
 * @property object      $sync_cron
 */
class FS_Storage
{
    /**
     * @var FS_Storage[]
     */
    private static $_instances = array();
    /**
     * @var FS_Key_Value_Storage Site level storage.
     */
    private $_storage;
    /**
     * @var FS_Key_Value_Storage Network level storage.
     */
    private $_network_storage;
    /**
     * @var string
     */
    private $_module_type;
    /**
     * @var string
     */
    private $_module_slug;
    /**
     * @var int The ID of the blog that is associated with the current site level options.
     */
    private $_blog_id = 0;
    /**
     * @var bool
     */
    private $_is_multisite;
    /**
     * @var bool
     */
    private $_is_network_active = \false;
    /**
     * @var bool
     */
    private $_is_delegated_connection = \false;
    /**
     * @var array {
     * @key   string Option name.
     * @value int If 0 store on the network level. If 1, store on the network level only if module was network level activated. If 2, store on the network level only if network activated and NOT delegated the connection.
     * }
     */
    private static $_NETWORK_OPTIONS_MAP;
    const OPTION_LEVEL_UNDEFINED = -1;
    // The option should be stored on the network level.
    const OPTION_LEVEL_NETWORK = 0;
    // The option should be stored on the network level when the plugin is network-activated.
    const OPTION_LEVEL_NETWORK_ACTIVATED = 1;
    // The option should be stored on the network level when the plugin is network-activated and the opt-in connection was NOT delegated to the sub-site admin.
    const OPTION_LEVEL_NETWORK_ACTIVATED_NOT_DELEGATED = 2;
    // The option should be stored on the site level.
    const OPTION_LEVEL_SITE = 3;
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string $module_type
     * @param string $slug
     *
     * @return FS_Storage
     */
    static function instance($module_type, $slug)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string $module_type
     * @param string $slug
     */
    private function __construct($module_type, $slug)
    {
    }
    /**
     * Tells this storage wrapper class that the context plugin is network active. This flag will affect how values
     * are retrieved/stored from/into the storage.
     *
     * @author Leo Fajardo (@leorw)
     *
     * @param bool $is_network_active
     * @param bool $is_delegated_connection
     */
    function set_network_active($is_network_active = \true, $is_delegated_connection = \false)
    {
    }
    /**
     * Switch the context of the site level storage manager.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     */
    function set_site_blog_context($blog_id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string        $key
     * @param mixed         $value
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_BINARY_MAP).
     * @param int           $option_level Since 2.5.1
     * @param bool          $flush
     */
    function store($key, $value, $network_level_or_blog_id = \null, $option_level = self::OPTION_LEVEL_UNDEFINED, $flush = \true)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param bool          $store
     * @param string[]      $exceptions Set of keys to keep and not clear.
     * @param int|null|bool $network_level_or_blog_id
     */
    function clear_all($store = \true, $exceptions = array(), $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string        $key
     * @param bool          $store
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_BINARY_MAP).
     */
    function remove($key, $store = \true, $network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string        $key
     * @param mixed         $default
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_BINARY_MAP).
     * @param int           $option_level Since 2.5.1
     *
     * @return mixed
     */
    function get($key, $default = \false, $network_level_or_blog_id = \null, $option_level = self::OPTION_LEVEL_UNDEFINED)
    {
    }
    /**
     * Multisite activated:
     *      true:    Save network storage.
     *      int:     Save site specific storage.
     *      false|0: Save current site storage.
     *      null:    Save network and current site storage.
     * Site level activated:
     *               Save site storage.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param bool|int|null $network_level_or_blog_id
     */
    function save($network_level_or_blog_id = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function get_module_slug()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function get_module_type()
    {
    }
    /**
     * Migration script to the new storage data structure that is network compatible.
     *
     * IMPORTANT:
     *      This method should be executed only after it is determined if this is a network
     *      level compatible product activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function migrate_to_network()
    {
    }
    #--------------------------------------------------------------------------------
    #region Helper Methods
    #--------------------------------------------------------------------------------
    /**
     * We don't want to load the map right away since it's not even needed in a non-MS environment.
     *
     * Example:
     * array(
     *      'option1' => 0, // Means that the option should always be stored on the network level.
     *      'option2' => 1, // Means that the option should be stored on the network level only when the module was network level activated.
     *      'option2' => 2, // Means that the option should be stored on the network level only when the module was network level activated AND the connection was NOT delegated.
     *      'option3' => 3, // Means that the option should always be stored on the site level.
     * )
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    private static function load_network_options_map()
    {
    }
    /**
     * This method will and should only be executed when is_multisite() is true.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $key
     * @param int    $option_level Since 2.5.1
     *
     * @return bool
     */
    private function is_multisite_option($key, $option_level = self::OPTION_LEVEL_UNDEFINED)
    {
    }
    /**
     * @author Leo Fajardo
     *
     * @param string        $key
     * @param null|bool|int $network_level_or_blog_id When an integer, use the given blog storage. When `true` use the multisite storage (if there's a network). When `false`, use the current context blog storage. When `null`, the decision which storage to use (MS vs. Current S) will be handled internally and determined based on the $option (based on self::$_BINARY_MAP).
     * @param int           $option_level Since 2.5.1
     *
     * @return bool
     */
    private function should_use_network_storage($key, $network_level_or_blog_id = \null, $option_level = self::OPTION_LEVEL_UNDEFINED)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $blog_id
     *
     * @return \FS_Key_Value_Storage
     */
    private function get_site_storage($blog_id = 0)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Magic methods
    #--------------------------------------------------------------------------------
    function __set($k, $v)
    {
    }
    function __isset($k)
    {
    }
    function __unset($k)
    {
    }
    function __get($k)
    {
    }
    #endregion
}
/**
 * Class FS_User_Lock
 */
class FS_User_Lock
{
    /**
     * @var FS_Lock
     */
    private $_lock;
    #--------------------------------------------------------------------------------
    #region Singleton
    #--------------------------------------------------------------------------------
    /**
     * @var FS_User_Lock
     */
    private static $_instance;
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return FS_User_Lock
     */
    static function instance()
    {
    }
    #endregion
    private function __construct()
    {
    }
    /**
     * Try to acquire lock. If the lock is already set or is being acquired by another locker, don't do anything.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @param int $expiration
     *
     * @return bool TRUE if successfully acquired lock.
     */
    function try_lock($expiration = 0)
    {
    }
    /**
     * Acquire lock regardless if it's already acquired by another locker or not.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @param int $expiration
     */
    function lock($expiration = 0)
    {
    }
    /**
     * Unlock the lock.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     */
    function unlock()
    {
    }
}
class FS_Entity
{
    /**
     * @var number
     */
    public $id;
    /**
     * @var string Datetime value in 'YYYY-MM-DD HH:MM:SS' format.
     */
    public $updated;
    /**
     * @var string Datetime value in 'YYYY-MM-DD HH:MM:SS' format.
     */
    public $created;
    /**
     * @param bool|object $entity
     */
    function __construct($entity = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param FS_Entity $entity1
     * @param FS_Entity $entity2
     *
     * @return bool
     */
    static function equals($entity1, $entity2)
    {
    }
    private $_is_updated = \false;
    /**
     * Update object property.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param  string|array[string]mixed $key
     * @param string|bool $val
     *
     * @return bool
     */
    function update($key, $val = \false)
    {
    }
    /**
     * Checks if entity was updated.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_updated()
    {
    }
    /**
     * @param $id
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.2
     *
     * @return bool
     */
    static function is_valid_id($id)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @return string
     */
    public static function get_class_name()
    {
    }
}
class FS_Scope_Entity extends \FS_Entity
{
    /**
     * @var string
     */
    public $public_key;
    /**
     * @var string
     */
    public $secret_key;
    /**
     * @param bool|stdClass $scope_entity
     */
    function __construct($scope_entity = \false)
    {
    }
}
class FS_AffiliateTerms extends \FS_Scope_Entity
{
    #region Properties
    /**
     * @var bool
     */
    public $is_active;
    /**
     * @var string Enum: `affiliation` or `rewards`. Defaults to `affiliation`.
     */
    public $type;
    /**
     * @var string Enum: `payout` or `credit`. Defaults to `payout`.
     */
    public $reward_type;
    /**
     * If `first`, the referral will be attributed to the first visited source containing the affiliation link that
     * was clicked.
     *
     * @var string Enum: `first` or `last`. Defaults to `first`.
     */
    public $referral_attribution;
    /**
     * @var int Defaults to `30`, `0` for session cookie, and `null` for endless cookie (until cookies are cleaned).
     */
    public $cookie_days;
    /**
     * @var int
     */
    public $commission;
    /**
     * @var string Enum: `percentage` or `dollar`. Defaults to `percentage`.
     */
    public $commission_type;
    /**
     * @var null|int Defaults to `0` (affiliate only on first payment). `null` for commission for all renewals. If
     *          greater than `0`, affiliate will get paid for all renewals for `commission_renewals_days` days after
     *          the initial upgrade/purchase.
     */
    public $commission_renewals_days;
    /**
     * @var int Only cents and no percentage. In US cents, e.g.: 100 = $1.00. Defaults to `null`.
     */
    public $install_commission;
    /**
     * @var string Required default target link, e.g.: pricing page.
     */
    public $default_url;
    /**
     * @var string One of the following: 'all', 'new_customer', 'new_user'.
     *             If 'all' - reward for any user type.
     *             If 'new_customer' - reward only for new customers.
     *             If 'new_user' - reward only for new users.
     */
    public $reward_customer_type;
    /**
     * @var int Defaults to `0` (affiliate only on directly affiliated links). `null` if an affiliate will get
     *          paid for all customers' lifetime payments. If greater than `0`, an affiliate will get paid for all
     *          customer payments for `future_payments_days` days after the initial payment.
     */
    public $future_payments_days;
    /**
     * @var bool If `true`, allow referrals from social sites.
     */
    public $is_social_allowed;
    /**
     * @var bool If `true`, allow conversions without HTTP referrer header at all.
     */
    public $is_app_allowed;
    /**
     * @var bool If `true`, allow referrals from any site.
     */
    public $is_any_site_allowed;
    /**
     * @var string $plugin_title Title of the plugin. This is used in case we are showing affiliate form for a Bundle instead of the `plugin` in context.
     */
    public $plugin_title;
    #endregion Properties
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @return string
     */
    function get_formatted_commission()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @return bool
     */
    function has_lifetime_commission()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @return bool
     */
    function is_session_cookie()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @return bool
     */
    function has_renewals_commission()
    {
    }
}
class FS_Affiliate extends \FS_Scope_Entity
{
    #region Properties
    /**
     * @var string
     */
    public $paypal_email;
    /**
     * @var number
     */
    public $custom_affiliate_terms_id;
    /**
     * @var boolean
     */
    public $is_using_custom_terms;
    /**
     * @var string status Enum: `pending`, `rejected`, `suspended`, or `active`. Defaults to `pending`.
     */
    public $status;
    /**
     * @var string
     */
    public $domain;
    #endregion Properties
    /**
     * @author Leo Fajardo
     *
     * @return bool
     */
    function is_active()
    {
    }
    /**
     * @author Leo Fajardo
     *
     * @return bool
     */
    function is_pending()
    {
    }
    /**
     * @author Leo Fajardo
     *
     * @return bool
     */
    function is_suspended()
    {
    }
    /**
     * @author Leo Fajardo
     *
     * @return bool
     */
    function is_rejected()
    {
    }
    /**
     * @author Leo Fajardo
     *
     * @return bool
     */
    function is_blocked()
    {
    }
}
class FS_Billing extends \FS_Entity
{
    #region Properties
    /**
     * @var int
     */
    public $entity_id;
    /**
     * @var string (Enum) Linked entity type. One of: developer, plugin, user, install
     */
    public $entity_type;
    /**
     * @var string
     */
    public $business_name;
    /**
     * @var string
     */
    public $first;
    /**
     * @var string
     */
    public $last;
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $phone;
    /**
     * @var string
     */
    public $website;
    /**
     * @var string Tax or VAT ID.
     */
    public $tax_id;
    /**
     * @var string
     */
    public $address_street;
    /**
     * @var string
     */
    public $address_apt;
    /**
     * @var string
     */
    public $address_city;
    /**
     * @var string
     */
    public $address_country;
    /**
     * @var string Two chars country code.
     */
    public $address_country_code;
    /**
     * @var string
     */
    public $address_state;
    /**
     * @var number Numeric ZIP code (cab be with leading zeros).
     */
    public $address_zip;
    #endregion Properties
    /**
     * @param object|bool $event
     */
    function __construct($event = \false)
    {
    }
    static function get_type()
    {
    }
}
class FS_Payment extends \FS_Entity
{
    #region Properties
    /**
     * @var number
     */
    public $plugin_id;
    /**
     * @var number
     */
    public $user_id;
    /**
     * @var number
     */
    public $install_id;
    /**
     * @var number
     */
    public $subscription_id;
    /**
     * @var number
     */
    public $plan_id;
    /**
     * @var number
     */
    public $license_id;
    /**
     * @var float
     */
    public $gross;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string One of the following: `usd`, `gbp`, `eur`.
     */
    public $currency;
    /**
     * @var number
     */
    public $bound_payment_id;
    /**
     * @var string
     */
    public $external_id;
    /**
     * @var string
     */
    public $gateway;
    /**
     * @var string ISO 3166-1 alpha-2 - two-letter country code.
     *
     * @link http://www.wikiwand.com/en/ISO_3166-1_alpha-2
     */
    public $country_code;
    /**
     * @var string
     */
    public $vat_id;
    /**
     * @var float Actual Tax / VAT in $$$
     */
    public $vat;
    /**
     * @var int Payment source.
     */
    public $source = 0;
    #endregion Properties
    const CURRENCY_USD = 'usd';
    const CURRENCY_GBP = 'gbp';
    const CURRENCY_EUR = 'eur';
    /**
     * @param object|bool $payment
     */
    function __construct($payment = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @return bool
     */
    function is_refund()
    {
    }
    /**
     * Checks if the payment was migrated from another platform.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.2
     *
     * @return bool
     */
    function is_migrated()
    {
    }
    /**
     * Returns the gross in this format:
     *  `{symbol}{amount | 2 decimal digits} {currency | uppercase}`
     *
     * Examples: £9.99 GBP, -£9.99 GBP.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return string
     */
    function formatted_gross()
    {
    }
    /**
     * A map between supported currencies with their symbols.
     *
     * @var array<string,string>
     */
    static $CURRENCY_2_SYMBOL;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return string
     */
    private function get_symbol()
    {
    }
}
class FS_Plugin_Info extends \FS_Entity
{
    public $plugin_id;
    public $description;
    public $short_description;
    public $banner_url;
    public $card_banner_url;
    public $selling_point_0;
    public $selling_point_1;
    public $selling_point_2;
    public $screenshots;
    /**
     * @param stdClass|bool $plugin_info
     */
    function __construct($plugin_info = \false)
    {
    }
    static function get_type()
    {
    }
}
/**
 * Class FS_Plugin_License
 */
class FS_Plugin_License extends \FS_Entity
{
    #region Properties
    /**
     * @var number
     */
    public $plugin_id;
    /**
     * @var number
     */
    public $user_id;
    /**
     * @var number
     */
    public $plan_id;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string
     */
    public $parent_plan_name;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string
     */
    public $parent_plan_title;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var number
     */
    public $parent_license_id;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.4.0
     *
     * @var array
     */
    public $products;
    /**
     * @var number
     */
    public $pricing_id;
    /**
     * @var int|null
     */
    public $quota;
    /**
     * @var int
     */
    public $activated;
    /**
     * @var int
     */
    public $activated_local;
    /**
     * @var string
     */
    public $expiration;
    /**
     * @var string
     */
    public $secret_key;
    /**
     * @var bool
     */
    public $is_whitelabeled;
    /**
     * @var bool $is_free_localhost Defaults to true. If true, allow unlimited localhost installs with the same
     *      license.
     */
    public $is_free_localhost;
    /**
     * @var bool $is_block_features Defaults to true. If false, don't block features after license expiry - only
     *      block updates and support.
     */
    public $is_block_features;
    /**
     * @var bool
     */
    public $is_cancelled;
    #endregion Properties
    /**
     * @param stdClass|bool $license
     */
    function __construct($license = \false)
    {
    }
    /**
     * Get entity type.
     *
     * @return string
     */
    static function get_type()
    {
    }
    /**
     * Check how many site activations left.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return int
     */
    function left()
    {
    }
    /**
     * Check if single site license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8.1
     *
     * @return bool
     */
    function is_single_site()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function is_expired()
    {
    }
    /**
     * Check if license is not expired.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @return bool
     */
    function is_valid()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function is_lifetime()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.0
     *
     * @return bool
     */
    function is_unlimited()
    {
    }
    /**
     * Check if license is fully utilized.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool|null $is_localhost
     *
     * @return bool
     */
    function is_utilized($is_localhost = \null)
    {
    }
    /**
     * Check if license can be activated.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param bool|null $is_localhost
     *
     * @return bool
     */
    function can_activate($is_localhost = \null)
    {
    }
    /**
     * Check if license can be activated on a given number of production and localhost sites.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param int $production_count
     * @param int $localhost_count
     *
     * @return bool
     */
    function can_activate_bulk($production_count, $localhost_count)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1
     *
     * @return bool
     */
    function is_active()
    {
    }
    /**
     * Check if license's plan features are enabled.
     *
     *  - Either if plan not expired
     *  - If expired, based on the configuration to block features or not.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function is_features_enabled()
    {
    }
    /**
     * Subscription considered to be new without any payments
     * if the license expires in less than 24 hours
     * from the license creation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_first_payment_pending()
    {
    }
    /**
     * @return int
     */
    function total_activations()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since 2.3.1
     *
     * @return string
     */
    function get_html_escaped_masked_secret_key()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @param string $secret_key
     *
     * @return string
     */
    static function mask_secret_key_for_html($secret_key)
    {
    }
}
/**
 * Class FS_Plugin_Plan
 *
 * @property FS_Pricing[] $pricing
 */
class FS_Plugin_Plan extends \FS_Entity
{
    #region Properties
    /**
     * @var number
     */
    public $plugin_id;
    /**
     * @var string
     */
    public $name;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $description;
    /**
     * @var bool Defaults to true. If true, allow unlimited localhost installs with the same license.
     */
    public $is_free_localhost;
    /**
     * @var bool Defaults to true. If false, don't block features after license expiry - only block updates and
     *      support.
     */
    public $is_block_features;
    /**
     * @var int
     */
    public $license_type;
    /**
     * @var bool
     */
    public $is_https_support;
    /**
     * @var int Trial days.
     */
    public $trial_period;
    /**
     * @var string If true, require payment for trial.
     */
    public $is_require_subscription;
    /**
     * @var string Knowledge Base URL.
     */
    public $support_kb;
    /**
     * @var string Support Forum URL.
     */
    public $support_forum;
    /**
     * @var string Support email address.
     */
    public $support_email;
    /**
     * @var string Support phone.
     */
    public $support_phone;
    /**
     * @var string Support skype username.
     */
    public $support_skype;
    /**
     * @var bool Is personal success manager supported with the plan.
     */
    public $is_success_manager;
    /**
     * @var bool Is featured plan.
     */
    public $is_featured;
    /**
     * @var bool Is hidden plan.
     */
    public $is_hidden;
    #endregion Properties
    /**
     * @param object|bool $plan
     */
    function __construct($plan = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_free()
    {
    }
    /**
     * Checks if this plan supports "Technical Support".
     *
     * @author Leo Fajardo (leorw)
     * @since 1.2.0
     *
     * @return bool
     */
    function has_technical_support()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function has_trial()
    {
    }
}
class FS_Plugin_Tag extends \FS_Entity
{
    /**
     * @var string
     */
    public $version;
    /**
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $requires_platform_version;
    /**
     * @var string
     */
    public $requires_programming_language_version;
    /**
     * @var string
     */
    public $tested_up_to_version;
    /**
     * @var bool
     */
    public $has_free;
    /**
     * @var bool
     */
    public $has_premium;
    /**
     * @var string One of the following: `pending`, `beta`, `unreleased`.
     */
    public $release_mode;
    function __construct($tag = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @return bool
     */
    function is_beta()
    {
    }
}
class FS_Plugin extends \FS_Scope_Entity
{
    /**
     * @since 1.0.6
     * @var null|number
     */
    public $parent_plugin_id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $slug;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.1
     *
     * @var string
     */
    public $premium_slug;
    /**
     * @since 1.2.2
     *
     * @var string 'plugin' or 'theme'
     */
    public $type;
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.2.3
     *
     * @var string|false false if the module doesn't have an affiliate program or one of the following: 'selected', 'customers', or 'all'.
     */
    public $affiliate_moderation;
    /**
     * @var bool Set to true if the free version of the module is hosted on WordPress.org. Defaults to true.
     */
    public $is_wp_org_compliant = \true;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.5
     *
     * @var int
     */
    public $premium_releases_count;
    #region Install Specific Properties
    /**
     * @var string
     */
    public $file;
    /**
     * @var string
     */
    public $version;
    /**
     * @var bool
     */
    public $auto_update;
    /**
     * @var FS_Plugin_Info
     */
    public $info;
    /**
     * @since 1.0.9
     *
     * @var bool
     */
    public $is_premium;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.2.1
     *
     * @var string
     */
    public $premium_suffix;
    /**
     * @since 1.0.9
     *
     * @var bool
     */
    public $is_live;
    /**
     * @since 2.2.3
     * @var null|number
     */
    public $bundle_id;
    /**
     * @since 2.3.1
     * @var null|string
     */
    public $bundle_public_key;
    /**
     * @since 2.5.4
     * @var null|array
     */
    public $opt_in_moderation;
    const AFFILIATE_MODERATION_CUSTOMERS = 'customers';
    #endregion Install Specific Properties
    /**
     * @param stdClass|bool $plugin
     */
    function __construct($plugin = \false)
    {
    }
    /**
     * Check if plugin is an add-on (has parent).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool
     */
    function is_addon()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.3
     *
     * @return bool
     */
    function has_affiliate_program()
    {
    }
    static function get_type()
    {
    }
}
class FS_Pricing extends \FS_Entity
{
    #region Properties
    /**
     * @var number
     */
    public $plan_id;
    /**
     * @var int
     */
    public $licenses;
    /**
     * @var null|float
     */
    public $monthly_price;
    /**
     * @var null|float
     */
    public $annual_price;
    /**
     * @var null|float
     */
    public $lifetime_price;
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.3.1
     *
     * @var string One of the following: `usd`, `gbp`, `eur`.
     */
    public $currency;
    #endregion Properties
    /**
     * @param object|bool $pricing
     */
    function __construct($pricing = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return bool
     */
    function has_monthly()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return bool
     */
    function has_annual()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return bool
     */
    function has_lifetime()
    {
    }
    /**
     * Check if unlimited licenses pricing.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return bool
     */
    function is_unlimited()
    {
    }
    /**
     * Check if pricing has more than one billing cycle.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return bool
     */
    function is_multi_cycle()
    {
    }
    /**
     * Get annual over monthly discount.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return int
     */
    function annual_discount_percentage()
    {
    }
    /**
     * Get annual over monthly savings.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.8
     *
     * @return float
     */
    function annual_savings()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.1
     *
     * @return bool
     */
    function is_usd()
    {
    }
}
/**
 * @property int $blog_id
 */
#[\AllowDynamicProperties]
class FS_Site extends \FS_Scope_Entity
{
    /**
     * @var number
     */
    public $site_id;
    /**
     * @var number
     */
    public $plugin_id;
    /**
     * @var number
     */
    public $user_id;
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $url;
    /**
     * @var string
     */
    public $version;
    /**
     * @var string E.g. en-GB
     */
    public $language;
    /**
     * @var string Platform version (e.g WordPress version).
     */
    public $platform_version;
    /**
     * Freemius SDK version
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @var string SDK version (e.g.: 1.2.2)
     */
    public $sdk_version;
    /**
     * @var string Programming language version (e.g PHP version).
     */
    public $programming_language_version;
    /**
     * @var number|null
     */
    public $plan_id;
    /**
     * @var number|null
     */
    public $license_id;
    /**
     * @var number|null
     */
    public $trial_plan_id;
    /**
     * @var string|null
     */
    public $trial_ends;
    /**
     * @since 1.0.9
     *
     * @var bool
     */
    public $is_premium = \false;
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @since  1.2.1.5
     * @deprecated Since 2.5.1
     * @todo Remove after a few releases.
     *
     * @var bool
     */
    public $is_disconnected = \false;
    /**
     * @since  2.0.0
     *
     * @var bool
     */
    public $is_active = \true;
    /**
     * @since  2.0.0
     *
     * @var bool
     */
    public $is_uninstalled = \false;
    /**
     * @author Edgar Melkonyan
     *
     * @since 2.4.2
     *
     * @var bool
     */
    public $is_beta;
    /**
     * @param stdClass|bool $site
     */
    function __construct($site = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $url
     *
     * @return bool
     */
    static function is_localhost_by_address($url)
    {
    }
    function is_localhost()
    {
    }
    /**
     * Check if site in trial.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_trial()
    {
    }
    /**
     * Check if user already utilized the trial with the current install.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_trial_utilized()
    {
    }
    /**
     * @author Edgar Melkonyan
     *
     * @return bool
     */
    function is_beta()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.1
     *
     * @param string $site_url
     *
     * @return bool
     */
    function is_clone($site_url)
    {
    }
}
class FS_Subscription extends \FS_Entity
{
    #region Properties
    /**
     * @var number
     */
    public $user_id;
    /**
     * @var number
     */
    public $install_id;
    /**
     * @var number
     */
    public $plan_id;
    /**
     * @var number
     */
    public $license_id;
    /**
     * @var float
     */
    public $total_gross;
    /**
     * @var float
     */
    public $amount_per_cycle;
    /**
     * @var int # of months
     */
    public $billing_cycle;
    /**
     * @var float
     */
    public $outstanding_balance;
    /**
     * @var int
     */
    public $failed_payments;
    /**
     * @var string
     */
    public $gateway;
    /**
     * @var string
     */
    public $external_id;
    /**
     * @var string|null
     */
    public $trial_ends;
    /**
     * @var string|null Datetime of the next payment, or null if cancelled.
     */
    public $next_payment;
    /**
     * @since 2.3.1
     *
     * @var string|null Datetime of the cancellation.
     */
    public $canceled_at;
    /**
     * @var string|null
     */
    public $vat_id;
    /**
     * @var string Two characters country code
     */
    public $country_code;
    #endregion Properties
    /**
     * @param object|bool $subscription
     */
    function __construct($subscription = \false)
    {
    }
    static function get_type()
    {
    }
    /**
     * Check if subscription is active.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_active()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @return bool
     */
    function is_canceled()
    {
    }
    /**
     * Subscription considered to be new without any payments
     * if the next payment should be made within less than 24 hours
     * from the subscription creation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function is_first_payment_pending()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     */
    function has_trial()
    {
    }
}
class FS_User extends \FS_Scope_Entity
{
    #region Properties
    /**
     * @var string
     */
    public $email;
    /**
     * @var string
     */
    public $first;
    /**
     * @var string
     */
    public $last;
    /**
     * @var bool
     */
    public $is_verified;
    /**
     * @var string|null
     */
    public $customer_id;
    /**
     * @var float
     */
    public $gross;
    #endregion Properties
    /**
     * @param object|bool $user
     */
    function __construct($user = \false)
    {
    }
    function get_name()
    {
    }
    function is_verified()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.4.2
     *
     * @return bool
     */
    function is_beta()
    {
    }
    static function get_type()
    {
    }
}
/**
 * Class FS_Plugin_Info_Dialog
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.7
 */
class FS_Plugin_Info_Dialog
{
    /**
     * @since 1.1.7
     *
     * @var FS_Logger
     */
    private $_logger;
    /**
     * @since 1.1.7
     *
     * @var Freemius
     */
    private $_fs;
    /**
     * Collection of plugin installation, update, download, activation, and purchase actions. This is used in
     * populating the actions dropdown list when there are at least 2 actions. If there's only 1 action, a button
     * is used instead.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string[]
     */
    private $actions;
    /**
     * Contains plugin status information that is used to determine which actions should be part of the actions
     * dropdown list.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @var string[]
     */
    private $status;
    function __construct(\Freemius $fs)
    {
    }
    /**
     * Generate add-on plugin information.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param array       $data
     * @param string      $action
     * @param object|null $args
     *
     * @return array|null
     */
    function _get_addon_info_filter($data, $action = '', $args = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @param FS_Plugin_Plan $plan
     *
     * @return string
     */
    private function get_billing_cycle(\FS_Plugin_Plan $plan)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param FS_Plugin_Plan $plan
     * @param FS_Pricing     $pricing
     *
     * @return float|null|string
     */
    private function get_price_tag(\FS_Plugin_Plan $plan, \FS_Pricing $pricing)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.0
     *
     * @param object         $api
     * @param FS_Plugin_Plan $plan
     *
     * @return string
     */
    private function get_actions_dropdown($api, $plan = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @param object         $api
     * @param FS_Plugin_Plan $plan
     *
     * @return string
     */
    private function get_checkout_cta($api, $plan = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.3.0
     *
     * @param object $api
     *
     * @return string[]
     */
    private function get_plugin_actions($api)
    {
    }
    /**
     * Rebuilds the status URL based on the admin URL.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.3.0
     *
     * @param int    $blog_id
     * @param string $network_status_url
     * @param string $status
     *
     * @return string
     */
    private static function get_blog_status_url($blog_id, $network_status_url, $status)
    {
    }
    /**
     * Helper method to get a CTA button HTML.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $label
     * @param bool   $is_primary
     * @param bool   $is_disabled
     * @param string $href
     * @param string $target
     *
     * @return string
     */
    private function get_cta($label, $is_primary = \true, $is_disabled = \false, $href = '', $target = '_blank')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7
     *
     * @param FS_Plugin_Plan $plan
     *
     * @return string
     */
    private function get_trial_period($plan)
    {
    }
    /**
     * Display plugin information in dialog box form.
     *
     * Based on core install_plugin_information() function.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function install_plugin_information()
    {
    }
}
class FS_Admin_Menu_Manager
{
    #region Properties
    /**
     * @since 1.2.2
     *
     * @var string
     */
    protected $_module_unique_affix;
    /**
     * @since 1.2.2
     *
     * @var number
     */
    protected $_module_id;
    /**
     * @since 1.2.2
     *
     * @var string
     */
    protected $_module_type;
    /**
     * @since 1.0.6
     *
     * @var string
     */
    private $_menu_slug;
    /**
     * @since 1.1.3
     *
     * @var string
     */
    private $_parent_slug;
    /**
     * @since 1.1.3
     *
     * @var string
     */
    private $_parent_type;
    /**
     * @since 1.1.3
     *
     * @var string
     */
    private $_type;
    /**
     * @since 1.1.3
     *
     * @var bool
     */
    private $_is_top_level;
    /**
     * @since 1.1.3
     *
     * @var bool
     */
    private $_is_override_exact;
    /**
     * @since 1.1.3
     *
     * @var array<string,bool>
     */
    private $_default_submenu_items;
    /**
     * @since 1.1.3
     *
     * @var string
     */
    private $_first_time_path;
    /**
     * @since 1.2.2
     *
     * @var bool
     */
    private $_menu_exists;
    /**
     * @since 2.0.0
     *
     * @var bool
     */
    private $_network_menu_exists;
    #endregion Properties
    /**
     * @var FS_Logger
     */
    protected $_logger;
    #region Singleton
    /**
     * @var FS_Admin_Menu_Manager[]
     */
    private static $_instances = array();
    /**
     * @param number $module_id
     * @param string $module_type
     * @param string $module_unique_affix
     *
     * @return FS_Admin_Menu_Manager
     */
    static function instance($module_id, $module_type, $module_unique_affix)
    {
    }
    protected function __construct($module_id, $module_type, $module_unique_affix)
    {
    }
    #endregion Singleton
    #region Helpers
    private function get_option(&$options, $key, $default = \false)
    {
    }
    private function get_bool_option(&$options, $key, $default = \false)
    {
    }
    #endregion Helpers
    /**
     * @param array $menu
     * @param bool  $is_addon
     */
    function init($menu, $is_addon = \false)
    {
    }
    /**
     * Check if top level menu.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return bool False if submenu item.
     */
    function is_top_level()
    {
    }
    /**
     * Check if the page should be override on exact URL match.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return bool False if submenu item.
     */
    function is_override_exact()
    {
    }
    /**
     * Get the path of the page the user should be forwarded to after first activation.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param bool $is_network Since 2.4.5
     *
     * @return string
     */
    function get_first_time_path($is_network = \false)
    {
    }
    /**
     * Check if plugin's menu item is part of a custom top level menu.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return bool
     */
    function has_custom_parent()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @return bool
     */
    function has_menu()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return bool
     */
    function has_network_menu()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string $menu_slug
     *
     * @since 2.1.3
     */
    function set_slug_and_network_menu_exists_flag($menu_slug)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string $id
     * @param bool   $default
     * @param bool   $ignore_menu_existence Since 1.2.2.7 If true, check if the submenu item visible even if there's no parent menu.
     *
     * @return bool
     */
    function is_submenu_item_visible($id, $default = \true, $ignore_menu_existence = \false)
    {
    }
    /**
     * Calculates admin settings menu slug.
     * If plugin's menu slug is a file (e.g. CPT), uses plugin's slug as the menu slug.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string $page
     *
     * @return string
     */
    function get_slug($page = '')
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_parent_slug()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return bool
     */
    function is_cpt()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_parent_type()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_raw_slug()
    {
    }
    /**
     * Get plugin's original menu slug.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_original_menu_slug()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    function get_top_level_menu_slug()
    {
    }
    /**
     * Is user on plugin's admin activation page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     *
     * @param bool $show_opt_in_on_themes_page Since 2.3.1
     *
     * @return bool
     *
     * @deprecated Please use is_activation_page() instead.
     */
    function is_main_settings_page($show_opt_in_on_themes_page = \false)
    {
    }
    /**
     * Is user on product's admin activation page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.3.1
     *
     * @param bool $show_opt_in_on_themes_page Since 2.3.1
     *
     * @return bool
     */
    function is_activation_page($show_opt_in_on_themes_page = \false)
    {
    }
    #region Submenu Override
    /**
     * Override submenu's action.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.0
     *
     * @param string   $parent_slug
     * @param string   $menu_slug
     * @param callable $function
     *
     * @return false|string If submenu exist, will return the hook name.
     */
    function override_submenu_action($parent_slug, $menu_slug, $function)
    {
    }
    #endregion Submenu Override
    #region Top level menu Override
    /**
     * Find plugin's admin dashboard main menu item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @return string[]|false
     */
    private function find_top_level_menu()
    {
    }
    /**
     * Find plugin's admin dashboard main submenu item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.6
     *
     * @return array|false
     */
    private function find_main_submenu()
    {
    }
    /**
     * Remove all sub-menu items.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return bool If submenu with plugin's menu slug was found.
     */
    private function remove_all_submenu_items()
    {
    }
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool $remove_top_level_menu
     * 
     * @return false|array[string]mixed
     */
    function remove_menu_item($remove_top_level_menu = \false)
    {
    }
    /**
     * Get module's main admin setting page URL.
     *
     * @todo This method was only tested for wp.org compliant themes with a submenu item. Need to test for plugins with top level, submenu, and CPT top level, menu items.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @return string
     */
    function main_menu_url()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     *
     * @param callable $function
     *
     * @return false|array[string]mixed
     */
    function override_menu_item($function)
    {
    }
    /**
     * Adds a counter to the module's top level menu item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.1.5
     *
     * @param int    $counter
     * @param string $class
     */
    function add_counter_to_menu_item($counter = 1, $class = '')
    {
    }
    #endregion Top level menu Override
    /**
     * Add a top-level menu page.
     *
     * Note for WordPress.org Theme/Plugin reviewer:
     *
     *  This is a replication of `add_menu_page()` to avoid Theme Check warning.
     *
     *  Why?
     *  ====
     *  Freemius is an SDK for plugin and theme developers. Since the core
     *  of the SDK is relevant both for plugins and themes, for obvious reasons,
     *  we only develop and maintain one code base.
     *
     *  This method will not run for wp.org themes (only plugins) since theme
     *  admin settings/options are now only allowed in the customizer.
     *
     *  If you have any questions or need clarifications, please don't hesitate
     *  pinging me on slack, my username is @svovaf.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2
     *
     * @param string          $page_title The text to be displayed in the title tags of the page when the menu is
     *                                    selected.
     * @param string          $menu_title The text to be used for the menu.
     * @param string          $capability The capability required for this menu to be displayed to the user.
     * @param string          $menu_slug  The slug name to refer to this menu by (should be unique for this menu).
     * @param callable|string $function   The function to be called to output the content for this page.
     * @param string          $icon_url   The URL to the icon to be used for this menu.
     *                                    * Pass a base64-encoded SVG using a data URI, which will be colored to
     *                                    match the color scheme. This should begin with
     *                                    'data:image/svg+xml;base64,'.
     *                                    * Pass the name of a Dashicons helper class to use a font icon,
     *                                    e.g. 'dashicons-chart-pie'.
     *                                    * Pass 'none' to leave div.wp-menu-image empty so an icon can be added
     *                                    via CSS.
     * @param int             $position   The position in the menu order this one should appear.
     *
     * @return string The resulting page's hook_suffix.
     */
    static function add_page($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = \null)
    {
    }
    /**
     * Add page and update menu instance settings.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string          $page_title
     * @param string          $menu_title
     * @param string          $capability
     * @param string          $menu_slug
     * @param callable|string $function
     * @param string          $icon_url
     * @param int|null        $position
     *
     * @return string
     */
    function add_page_and_update($page_title, $menu_title, $capability, $menu_slug, $function = '', $icon_url = '', $position = \null)
    {
    }
    /**
     * Add a submenu page.
     *
     * Note for WordPress.org Theme/Plugin reviewer:
     *
     *  This is a replication of `add_submenu_page()` to avoid Theme Check warning.
     *
     *  Why?
     *  ====
     *  Freemius is an SDK for plugin and theme developers. Since the core
     *  of the SDK is relevant both for plugins and themes, for obvious reasons,
     *  we only develop and maintain one code base.
     *
     *  This method will not run for wp.org themes (only plugins) since theme
     *  admin settings/options are now only allowed in the customizer.
     *
     *  If you have any questions or need clarifications, please don't hesitate
     *  pinging me on slack, my username is @svovaf.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2
     *
     * @param string          $parent_slug The slug name for the parent menu (or the file name of a standard
     *                                     WordPress admin page).
     * @param string          $page_title  The text to be displayed in the title tags of the page when the menu is
     *                                     selected.
     * @param string          $menu_title  The text to be used for the menu.
     * @param string          $capability  The capability required for this menu to be displayed to the user.
     * @param string          $menu_slug   The slug name to refer to this menu by (should be unique for this menu).
     * @param callable|string $function    The function to be called to output the content for this page.
     *
     * @return false|string The resulting page's hook_suffix, or false if the user does not have the capability
     *                      required.
     */
    static function add_subpage($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '')
    {
    }
    /**
     * Add sub page and update menu instance settings.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string          $parent_slug
     * @param string          $page_title
     * @param string          $menu_title
     * @param string          $capability
     * @param string          $menu_slug
     * @param callable|string $function
     *
     * @return string
     */
    function add_subpage_and_update($parent_slug, $page_title, $menu_title, $capability, $menu_slug, $function = '')
    {
    }
}
class FS_Admin_Notice_Manager
{
    /**
     * @since 1.2.2
     *
     * @var string
     */
    protected $_module_unique_affix;
    /**
     * @var string
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_title;
    /**
     * @var array[string]array
     */
    private $_notices = array();
    /**
     * @var FS_Key_Value_Storage
     */
    private $_sticky_storage;
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @since 2.0.0
     * @var int The ID of the blog that is associated with the current site level admin notices.
     */
    private $_blog_id = 0;
    /**
     * @since 2.0.0
     * @var bool
     */
    private $_is_network_notices;
    /**
     * @var FS_Admin_Notice_Manager[]
     */
    private static $_instances = array();
    /**
     * @param string $id
     * @param string $title
     * @param string $module_unique_affix
     * @param bool   $is_network_and_blog_admins           Whether or not the message should be shown both on
     *                                                     network and blog admin pages.
     * @param bool   $network_level_or_blog_id Since 2.0.0
     *
     * @return \FS_Admin_Notice_Manager
     */
    static function instance($id, $title = '', $module_unique_affix = '', $is_network_and_blog_admins = \false, $network_level_or_blog_id = \false)
    {
    }
    /**
     * @param string $id
     * @param string $title
     * @param string $module_unique_affix
     * @param bool   $is_network_and_blog_admins Whether or not the message should be shown both on network and
     *                                             blog admin pages.
     * @param bool|int $network_level_or_blog_id
     */
    protected function __construct($id, $title = '', $module_unique_affix = '', $is_network_and_blog_admins = \false, $network_level_or_blog_id = \false)
    {
    }
    /**
     * Remove sticky message by ID.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     */
    function dismiss_notice_ajax_callback()
    {
    }
    /**
     * Rendered sticky message dismiss JavaScript.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    static function _add_sticky_dismiss_javascript()
    {
    }
    private static $_added_sticky_javascript = \false;
    /**
     * Hook to the admin_footer to add sticky message dismiss JavaScript handler.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    private static function has_sticky_messages()
    {
    }
    /**
     * Handle admin_notices by printing the admin messages stacked in the queue.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     */
    function _admin_notices_hook()
    {
    }
    /**
     * Enqueue common stylesheet to style admin notice.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _enqueue_styles()
    {
    }
    /**
     * Check if the current page is the Gutenberg block editor.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.2.3
     *
     * @return bool
     */
    function is_gutenberg_page()
    {
    }
    /**
     * Check if admin notices should be shown on page. E.g., we don't want to show notices in the Visual Editor.
     *
     * @author Xiaheng Chen (@xhchen)
     * @since  2.4.2
     *
     * @return bool
     */
    function show_admin_notices()
    {
    }
    /**
     * Add admin message to admin messages queue, and hook to admin_notices / all_admin_notices if not yet hooked.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string      $message
     * @param string      $title
     * @param string      $type
     * @param bool        $is_sticky
     * @param string      $id Message ID
     * @param bool        $store_if_sticky
     * @param number|null $wp_user_id
     * @param string|null $plugin_title
     * @param bool        $is_network_and_blog_admins Whether or not the message should be shown both on network
     *                                                and blog admin pages.
     * @param bool|null   $is_dismissible
     * @param array       $data
     *
     * @uses   add_action()
     */
    function add($message, $title = '', $type = 'success', $is_sticky = \false, $id = '', $store_if_sticky = \true, $wp_user_id = \null, $plugin_title = \null, $is_network_and_blog_admins = \false, $is_dismissible = \null, $data = array())
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string|string[] $ids
     * @param bool            $store
     */
    function remove_sticky($ids, $store = \true)
    {
    }
    /**
     * Check if sticky message exists by id.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param $id
     *
     * @return bool
     */
    function has_sticky($id)
    {
    }
    /**
     * Adds sticky admin notification.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string      $message
     * @param string      $id Message ID
     * @param string      $title
     * @param string      $type
     * @param number|null $wp_user_id
     * @param string|null $plugin_title
     * @param bool        $is_network_and_blog_admins Whether or not the message should be shown both on network
     *                                                and blog admin pages.
     * @param bool        $is_dimissible
     * @param array       $data
     */
    function add_sticky($message, $id, $title = '', $type = 'success', $wp_user_id = \null, $plugin_title = \null, $is_network_and_blog_admins = \false, $is_dimissible = \true, $data = array())
    {
    }
    /**
     * Retrieves the data of an sticky notice.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.4.3
     *
     * @param string $id Message ID.
     *
     * @return array|null
     */
    function get_sticky($id)
    {
    }
    /**
     * Clear all sticky messages.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     *
     * @param bool $is_temporary @since 2.5.1
     */
    function clear_all_sticky($is_temporary = \false)
    {
    }
    #--------------------------------------------------------------------------------
    #region Helper Method
    #--------------------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    private function get_notices_type()
    {
    }
    #endregion
}
class FS_Cache_Manager
{
    /**
     * @var FS_Option_Manager
     */
    private $_options;
    /**
     * @var FS_Logger
     */
    private $_logger;
    /**
     * @var FS_Cache_Manager[]
     */
    private static $_MANAGERS = array();
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string $id
     */
    private function __construct($id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param $id
     *
     * @return FS_Cache_Manager
     */
    static function get_manager($id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @return bool
     */
    function is_empty()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     */
    function clear()
    {
    }
    /**
     * Delete cache manager from DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function delete()
    {
    }
    /**
     * Check if there's a cached item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $key
     *
     * @return bool
     */
    function has($key)
    {
    }
    /**
     * Check if there's a valid cached item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string   $key
     * @param null|int $expiration Since 1.2.2.7
     *
     * @return bool
     */
    function has_valid($key, $expiration = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    function get($key, $default = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return mixed
     */
    function get_valid($key, $default = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $key
     * @param mixed  $value
     * @param int    $expiration
     * @param int    $created Since 2.0.0 Cache creation date.
     */
    function set($key, $value, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC, $created = \WP_FS__SCRIPT_START_TIME)
    {
    }
    /**
     * Get cached record expiration, or false if not cached or expired.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.7.3
     *
     * @param string $key
     *
     * @return bool|int
     */
    function get_record_expiration($key)
    {
    }
    /**
     * Purge cached item.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.6
     *
     * @param string $key
     */
    function purge($key)
    {
    }
    /**
     * Extend cached item caching period.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @param string $key
     * @param int    $expiration
     *
     * @return bool
     */
    function update_expiration($key, $expiration = \WP_FS__TIME_24_HOURS_IN_SEC)
    {
    }
    /**
     * Set cached item as expired.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.2.2.7
     *
     * @param string $key
     */
    function expire($key)
    {
    }
    #--------------------------------------------------------------------------------
    #region Migration
    #--------------------------------------------------------------------------------
    /**
     * Migrate options from site level.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function migrate_to_network()
    {
    }
    #endregion
}
/**
 * Manages the detection of clones and provides the logged-in WordPress user with options for manually resolving them.
 *
 * @since 2.5.0
 *
 * @property int    $clone_identification_timestamp
 * @property int    $temporary_duplicate_mode_selection_timestamp
 * @property int    $temporary_duplicate_notice_shown_timestamp
 * @property string $request_handler_id
 * @property int    $request_handler_timestamp
 * @property int    $request_handler_retries_count
 * @property bool   $hide_manual_resolution
 * @property array  $new_blog_install_map
 */
class FS_Clone_Manager
{
    /**
     * @var FS_Option_Manager
     */
    private $_storage;
    /**
     * @var FS_Option_Manager
     */
    private $_network_storage;
    /**
     * @var FS_Admin_Notices
     */
    private $_notices;
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @var int 3 minutes
     */
    const CLONE_RESOLUTION_MAX_EXECUTION_TIME = 180;
    /**
     * @var int
     */
    const CLONE_RESOLUTION_MAX_RETRIES = 3;
    /**
     * @var int
     */
    const TEMPORARY_DUPLICATE_PERIOD = \WP_FS__TIME_WEEK_IN_SEC * 2;
    /**
     * @var string
     */
    const OPTION_NAME = 'clone_resolution';
    /**
     * @var string
     */
    const OPTION_MANAGER_NAME = 'clone_management';
    /**
     * @var string
     */
    const OPTION_TEMPORARY_DUPLICATE = 'temporary_duplicate';
    /**
     * @var string
     */
    const OPTION_LONG_TERM_DUPLICATE = 'long_term_duplicate';
    /**
     * @var string
     */
    const OPTION_NEW_HOME = 'new_home';
    #--------------------------------------------------------------------------------
    #region Singleton
    #--------------------------------------------------------------------------------
    /**
     * @var FS_Clone_Manager
     */
    private static $_instance;
    /**
     * @return FS_Clone_Manager
     */
    static function instance()
    {
    }
    #endregion
    private function __construct()
    {
    }
    /**
     * Migrate clone resolution options from 2.5.0 array-based structure, to a new flat structure.
     *
     * The reason this logic is not in a separate migration script is that we want to be 100% sure data is migrated before any execution of clone logic.
     *
     * @todo Delete this one in the future.
     */
    private function maybe_migrate_options()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _init()
    {
    }
    /**
     * Retrieves the timestamp that was stored when a clone was identified.
     *
     * @return int|null
     */
    function get_clone_identification_timestamp()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.1
     *
     * @param string $sdk_last_version
     */
    function maybe_update_clone_resolution_support_flag($sdk_last_version)
    {
    }
    /**
     * Stores the time when a clone was identified.
     */
    function store_clone_identification_timestamp()
    {
    }
    /**
     * Retrieves the timestamp for the temporary duplicate mode's expiration.
     *
     * @return int
     */
    function get_temporary_duplicate_expiration_timestamp()
    {
    }
    /**
     * Determines if the SDK should handle clones. The SDK handles clones only up to 3 times with 3 min interval.
     *
     * @return bool
     */
    private function should_handle_clones()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.1
     *
     * @return bool
     */
    function should_hide_manual_resolution()
    {
    }
    /**
     * Executes the clones handler logic if it should be executed, i.e., based on the return value of the should_handle_clones() method.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function maybe_run_clone_resolution()
    {
    }
    /**
     * Executes the clones handler logic.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _handle_clone_resolution()
    {
    }
    #--------------------------------------------------------------------------------
    #region Automatic Clone Resolution
    #--------------------------------------------------------------------------------
    /**
     * @var array All installs cache.
     */
    private $all_installs;
    /**
     * Checks if a given instance's install is a clone of another subsite in the network.
     *
     * @author Vova Feldman (@svovaf)
     *
     * @return FS_Site
     */
    private function find_network_subsite_clone_install(\Freemius $instance)
    {
    }
    /**
     * Tries to find a different install of the context product that is associated with the current URL and loads it.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param Freemius $instance
     * @param string   $url
     *
     * @return object
     */
    private function find_other_install_by_url(\Freemius $instance, $url)
    {
    }
    /**
     * Delete the current install associated with a given instance and opt-in/activate-license to create a fresh install.
     *
     * @author Vova Feldman (@svovaf)
     * @since 2.5.0
     *
     * @param Freemius    $instance
     * @param string|false $license_key
     *
     * @return bool TRUE if successfully connected. FALSE if failed and had to restore install from backup.
     */
    private function delete_install_and_connect(\Freemius $instance, $license_key = \false)
    {
    }
    /**
     * Try to resolve the clone situation automatically.
     *
     * @param Freemius  $instance
     * @param string    $current_url
     * @param bool      $is_localhost
     * @param bool|null $is_clone_of_network_subsite
     *
     * @return bool If managed to automatically resolve the clone.
     */
    private function try_resolve_clone_automatically_by_instance(\Freemius $instance, $current_url, $is_localhost, $is_clone_of_network_subsite = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    private function try_resolve_clone_automatically()
    {
    }
    /**
     * Tries to resolve the clone situation automatically based on the config in the wp-config.php file.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param string $clone_action
     */
    private function try_resolve_clone_automatically_by_config($clone_action)
    {
    }
    /**
     * @author Leo Fajard (@leorw)
     * @since 2.5.0
     *
     * @return string|null
     */
    private function get_clone_resolution_action_from_config()
    {
    }
    /**
     * Tries to recover the install of a newly created subsite or resolve it if it's a clone.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param Freemius $instance
     */
    function maybe_resolve_new_subsite_install_automatically(\Freemius $instance)
    {
    }
    /**
     * If a new install was created after creating a new subsite, its ID is stored in the blog-install map so that it can be recovered in case it's replaced with a clone install (e.g., when the newly created subsite is a clone). The IDs of the clone subsites that were created while not running this version of the SDK or a higher version will also be stored in the said map so that the clone manager can also try to resolve them later on.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param int     $blog_id
     * @param FS_Site $site
     */
    function store_blog_install_info($blog_id, $site = \null)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param int $blog_id
     */
    private function remove_new_blog_install_info_from_storage($blog_id)
    {
    }
    /**
     * Tries to resolve all clones automatically.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @return bool If managed to automatically resolve all clones.
     */
    private function try_automatic_resolution()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Manual Clone Resolution
    #--------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _add_clone_resolution_javascript()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function _clone_resolution_action_ajax_handler()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @param string     $clone_action
     * @param Freemius[] $fs_instances
     * @param int        $blog_id
     *
     * @return array
     */
    private function resolve_cloned_sites($clone_action, $fs_instances = array(), $blog_id = 0)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    private function hide_clone_admin_notices()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     */
    function maybe_show_clone_admin_notice()
    {
    }
    /**
     * Removes the notices from the storage if the context product is either no longer active on the context subsite or it's active but there's no longer any clone. This prevents the notices from being shown on the network-level admin page when they are no longer relevant.
     *
     * @author Leo Fajardo (@leorw)
     * @since 2.5.1
     *
     * @return string[]
     */
    private function maybe_remove_notices()
    {
    }
    /**
     * Adds a notice that provides the logged-in WordPress user with manual clone resolution options.
     *
     * @param number[] $product_ids
     * @param string[] $site_urls
     * @param string   $current_url
     * @param bool     $has_license
     * @param bool     $is_premium
     * @param string   $doc_url
     */
    private function add_manual_clone_resolution_admin_notice($product_ids, $product_titles, $site_urls, $current_url, $has_license, $is_premium, $doc_url)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Temporary Duplicate (Short Term)
    #--------------------------------------------------------------------------------
    /**
     * @author Leo Fajardo (@leorw)
     * @since 2.5.0
     *
     * @return string
     */
    private function get_temporary_duplicate_admin_notice_string($site_urls, $product_titles, $module_label)
    {
    }
    /**
     * Determines if the temporary duplicate mode has already expired.
     *
     * @return bool
     */
    function has_temporary_duplicate_mode_expired()
    {
    }
    /**
     * Determines if the logged-in WordPress user manually selected the temporary duplicate mode for the site.
     *
     * @return bool
     */
    function was_temporary_duplicate_mode_selected()
    {
    }
    /**
     * Stores the time when the logged-in WordPress user selected the temporary duplicate mode for the site.
     */
    private function store_temporary_duplicate_timestamp()
    {
    }
    /**
     * Removes the notice that is shown when the logged-in WordPress user has selected the temporary duplicate mode for the site.
     *
     * @param bool $store
     */
    function remove_clone_resolution_options_notice($store = \true)
    {
    }
    /**
     * Removes the notice that is shown when the logged-in WordPress user has selected the temporary duplicate mode for the site.
     *
     * @param bool $store
     */
    function remove_temporary_duplicate_notice($store = \true)
    {
    }
    /**
     * Determines if the manual clone resolution options notice is currently being shown.
     *
     * @return bool
     */
    function is_clone_resolution_options_notice_shown()
    {
    }
    /**
     * Determines if the temporary duplicate notice is currently being shown.
     *
     * @return bool
     */
    function is_temporary_duplicate_notice_shown()
    {
    }
    /**
     * Determines if a site was marked as a temporary duplicate and if it's still a temporary duplicate.
     *
     * @return bool
     */
    function is_temporary_duplicate_by_blog_id($blog_id)
    {
    }
    /**
     * Determines the last time the temporary duplicate notice was shown.
     *
     * @return int|null
     */
    function last_time_temporary_duplicate_notice_was_shown()
    {
    }
    /**
     * Clears the time that has been stored when the temporary duplicate notice was shown.
     */
    function clear_temporary_duplicate_notice_shown_timestamp()
    {
    }
    /**
     * Adds a temporary duplicate notice that provides the logged-in WordPress user with an option to activate a license for the site.
     *
     * @param number[]    $product_ids
     * @param string      $message
     * @param string|null $plugin_title
     */
    function add_temporary_duplicate_sticky_notice($product_ids, $message, $plugin_title = \null)
    {
    }
    #endregion
    /**
     * @author Leo Fajardo
     * @since 2.5.0
     *
     * @param string $key
     *
     * @return bool
     */
    private function should_use_network_storage($key)
    {
    }
    /**
     * @param string      $key
     * @param number|null $blog_id
     *
     * @return FS_Option_Manager
     */
    private function get_storage($key, $blog_id = \null)
    {
    }
    /**
     * @param string      $name
     * @param bool        $flush
     * @param number|null $blog_id
     *
     * @return mixed
     */
    private function get_option($name, $flush = \false, $blog_id = \null)
    {
    }
    #--------------------------------------------------------------------------------
    #region Magic methods
    #--------------------------------------------------------------------------------
    /**
     * @param string     $name
     * @param int|string $value
     */
    function __set($name, $value)
    {
    }
    /**
     * @param string $name
     *
     * @return bool
     */
    function __isset($name)
    {
    }
    /**
     * @param string $name
     */
    function __unset($name)
    {
    }
    /**
     * @param string $name
     *
     * @return null|int|string
     */
    function __get($name)
    {
    }
    #endregion
}
class FS_GDPR_Manager
{
    /**
     * @var FS_Option_Manager
     */
    private $_storage;
    /**
     * @var array {
     * @type bool $required           Are GDPR rules apply on the current context admin.
     * @type bool $show_opt_in_notice Should the marketing and offers opt-in message be shown to the admin or not. If not set, defaults to `true`.
     * @type int  $notice_shown_at    Last time the special GDPR opt-in message was shown to the current admin.
     * }
     */
    private $_data;
    /**
     * @var int
     */
    private $_wp_user_id;
    /**
     * @var string
     */
    private $_option_name;
    /**
     * @var FS_Admin_Notices
     */
    private $_notices;
    #--------------------------------------------------------------------------------
    #region Singleton
    #--------------------------------------------------------------------------------
    /**
     * @var FS_GDPR_Manager
     */
    private static $_instance;
    /**
     * @return FS_GDPR_Manager
     */
    public static function instance()
    {
    }
    #endregion
    private function __construct()
    {
    }
    /**
     * Update a GDPR option for the current admin and store it.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @param string $name
     * @param mixed  $value
     */
    private function update_option($name, $value)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     *
     * @param bool $is_required
     */
    public function store_is_required($is_required)
    {
    }
    /**
     * Checks if the GDPR opt-in sticky notice is currently shown.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return bool
     */
    public function is_opt_in_notice_shown()
    {
    }
    /**
     * Remove the GDPR opt-in sticky notice.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     */
    public function remove_opt_in_notice()
    {
    }
    /**
     * Prevents the opt-in message from being added/shown.
     *
     * @author Leo Fajardo (@leorw)
     * @since  2.1.0
     */
    public function disable_opt_in_notice()
    {
    }
    /**
     * Checks if a GDPR opt-in message needs to be shown to the current admin.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return bool
     */
    public function should_show_opt_in_notice()
    {
    }
    /**
     * Get the last time the GDPR opt-in notice was shown.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     *
     * @return false|int
     */
    public function last_time_notice_was_shown()
    {
    }
    /**
     * Update the timestamp of the last time the GDPR opt-in message was shown to now.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     */
    public function notice_was_just_shown()
    {
    }
    /**
     * @param string      $message
     * @param string|null $plugin_title
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.1.0
     */
    public function add_opt_in_sticky_notice($message, $plugin_title = \null)
    {
    }
}
/**
 * Class FS_Key_Value_Storage
 *
 * @property int           $install_timestamp
 * @property int           $activation_timestamp
 * @property int           $sync_timestamp
 * @property object        $sync_cron
 * @property int           $install_sync_timestamp
 * @property array         $connectivity_test
 * @property array         $is_on
 * @property object        $trial_plan
 * @property bool          $has_trial_plan
 * @property bool          $trial_promotion_shown
 * @property string        $sdk_version
 * @property string        $sdk_last_version
 * @property bool          $sdk_upgrade_mode
 * @property bool          $sdk_downgrade_mode
 * @property bool          $plugin_upgrade_mode
 * @property bool          $plugin_downgrade_mode
 * @property string        $plugin_version
 * @property string        $plugin_last_version
 * @property bool          $is_plugin_new_install
 * @property bool          $was_plugin_loaded
 * @property object        $plugin_main_file
 * @property bool          $prev_is_premium
 * @property array         $is_anonymous
 * @property bool          $is_pending_activation
 * @property bool          $sticky_optin_added
 * @property object        $uninstall_reason
 * @property object        $subscription
 */
class FS_Key_Value_Storage implements \ArrayAccess, \Iterator, \Countable
{
    /**
     * @var string
     */
    protected $_id;
    /**
     * @since 1.2.2
     *
     * @var string
     */
    protected $_secondary_id;
    /**
     * @since 2.0.0
     * @var int The ID of the blog that is associated with the current site level options.
     */
    private $_blog_id = 0;
    /**
     * @since 2.0.0
     * @var bool
     */
    private $_is_multisite_storage;
    /**
     * @var array
     */
    protected $_data;
    /**
     * @var FS_Key_Value_Storage[]
     */
    private static $_instances = array();
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @param string $id
     * @param string $secondary_id
     * @param bool   $network_level_or_blog_id
     *
     * @return FS_Key_Value_Storage
     */
    static function instance($id, $secondary_id, $network_level_or_blog_id = \false)
    {
    }
    protected function __construct($id, $secondary_id, $network_level_or_blog_id = \false)
    {
    }
    protected function get_option_manager()
    {
    }
    protected function get_all_data()
    {
    }
    /**
     * Load plugin data from local DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function load()
    {
    }
    /**
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.7
     *
     * @param string $key
     * @param mixed  $value
     * @param bool   $flush
     */
    function store($key, $value, $flush = \true)
    {
    }
    /**
     * @author   Vova Feldman (@svovaf)
     * @since    2.0.0
     */
    function save()
    {
    }
    /**
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.7
     *
     * @param bool     $store
     * @param string[] $exceptions Set of keys to keep and not clear.
     */
    function clear_all($store = \true, $exceptions = array())
    {
    }
    /**
     * Delete key-value storage.
     *
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.9
     */
    function delete()
    {
    }
    /**
     * @author   Vova Feldman (@svovaf)
     * @since    1.0.7
     *
     * @param string $key
     * @param bool   $store
     */
    function remove($key, $store = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string $key
     * @param mixed  $default
     *
     * @return bool|\FS_Plugin
     */
    function get($key, $default = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     *
     * @return string
     */
    function get_secondary_id()
    {
    }
    /* ArrayAccess + Magic Access (better for refactoring)
       -----------------------------------------------------------------------------------*/
    function __set($k, $v)
    {
    }
    function __isset($k)
    {
    }
    function __unset($k)
    {
    }
    function __get($k)
    {
    }
    #[\ReturnTypeWillChange]
    function offsetSet($k, $v)
    {
    }
    #[\ReturnTypeWillChange]
    function offsetExists($k)
    {
    }
    #[\ReturnTypeWillChange]
    function offsetUnset($k)
    {
    }
    #[\ReturnTypeWillChange]
    function offsetGet($k)
    {
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the current element
     *
     * @link http://php.net/manual/en/iterator.current.php
     * @return mixed Can return any type.
     */
    #[\ReturnTypeWillChange]
    public function current()
    {
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Move forward to next element
     *
     * @link http://php.net/manual/en/iterator.next.php
     * @return void Any returned value is ignored.
     */
    #[\ReturnTypeWillChange]
    public function next()
    {
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Return the key of the current element
     *
     * @link http://php.net/manual/en/iterator.key.php
     * @return mixed scalar on success, or null on failure.
     */
    #[\ReturnTypeWillChange]
    public function key()
    {
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Checks if current position is valid
     *
     * @link http://php.net/manual/en/iterator.valid.php
     * @return boolean The return value will be casted to boolean and then evaluated.
     *       Returns true on success or false on failure.
     */
    #[\ReturnTypeWillChange]
    public function valid()
    {
    }
    /**
     * (PHP 5 &gt;= 5.0.0)<br/>
     * Rewind the Iterator to the first element
     *
     * @link http://php.net/manual/en/iterator.rewind.php
     * @return void Any returned value is ignored.
     */
    #[\ReturnTypeWillChange]
    public function rewind()
    {
    }
    /**
     * (PHP 5 &gt;= 5.1.0)<br/>
     * Count elements of an object
     *
     * @link http://php.net/manual/en/countable.count.php
     * @return int The custom count as an integer.
     *       </p>
     *       <p>
     *       The return value is cast to an integer.
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
    }
}
class FS_License_Manager
{
    //
    //
    //		/**
    //		 * @var FS_License_Manager[]
    //		 */
    //		private static $_instances = array();
    //
    //		static function instance( Freemius $fs ) {
    //			$slug = strtolower( $fs->get_slug() );
    //
    //			if ( ! isset( self::$_instances[ $slug ] ) ) {
    //				self::$_instances[ $slug ] = new FS_License_Manager( $slug, $fs );
    //			}
    //
    //			return self::$_instances[ $slug ];
    //		}
    //
    ////		private function __construct($slug) {
    ////			parent::__construct($slug);
    ////		}
    //
    //		function entry_id() {
    //			return 'licenses';
    //		}
    //
    //		function sync( $id ) {
    //
    //		}
    //
    //		/**
    //		 * @author Vova Feldman (@svovaf)
    //		 * @since  1.0.5
    //		 * @uses   FS_Api
    //		 *
    //		 * @param number|bool $plugin_id
    //		 *
    //		 * @return FS_Plugin_License[]|stdClass Licenses or API error.
    //		 */
    //		function api_get_user_plugin_licenses( $plugin_id = false ) {
    //			$api = $this->_fs->get_api_user_scope();
    //
    //			if ( ! is_numeric( $plugin_id ) ) {
    //				$plugin_id = $this->_fs->get_id();
    //			}
    //
    //			$result = $api->call( "/plugins/{$plugin_id}/licenses.json" );
    //
    //			if ( ! isset( $result->error ) ) {
    //				for ( $i = 0, $len = count( $result->licenses ); $i < $len; $i ++ ) {
    //					$result->licenses[ $i ] = new FS_Plugin_License( $result->licenses[ $i ] );
    //				}
    //
    //				$result = $result->licenses;
    //			}
    //
    //			return $result;
    //		}
    //
    //		function api_get_many() {
    //
    //		}
    //
    //		function api_activate( $id ) {
    //
    //		}
    //
    //		function api_deactivate( $id ) {
    //
    //		}
    /**
     * @param FS_Plugin_License[] $licenses
     *
     * @return bool
     */
    static function has_premium_license($licenses)
    {
    }
}
/**
 * 2-layer lazy options manager.
 *      layer 2: Memory
 *      layer 1: Database (options table). All options stored as one option record in the DB to reduce number of DB queries.
 *
 * If load() is not explicitly called, starts as empty manager. Same thing about saving the data - you have to explicitly call store().
 *
 * Class Freemius_Option_Manager
 */
class FS_Option_Manager
{
    /**
     * @var string
     */
    private $_id;
    /**
     * @var array|object
     */
    private $_options;
    /**
     * @var FS_Logger
     */
    private $_logger;
    /**
     * @since 2.0.0
     * @var int The ID of the blog that is associated with the current site level options.
     */
    private $_blog_id = 0;
    /**
     * @since 2.0.0
     * @var bool
     */
    private $_is_network_storage;
    /**
     * @var bool|null
     */
    private $_autoload;
    /**
     * @var array[string]FS_Option_Manager {
     * @key   string
     * @value FS_Option_Manager
     * }
     */
    private static $_MANAGERS = array();
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string    $id
     * @param bool      $load
     * @param bool|int  $network_level_or_blog_id Since 2.0.0
     * @param bool|null $autoload
     */
    private function __construct($id, $load = \false, $network_level_or_blog_id = \false, $autoload = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string    $id
     * @param bool      $load
     * @param bool|int  $network_level_or_blog_id Since 2.0.0
     * @param bool|null $autoload
     *
     * @return \FS_Option_Manager
     */
    static function get_manager($id, $load = \false, $network_level_or_blog_id = \false, $autoload = \null)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param bool $flush
     */
    function load($flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return bool
     */
    function is_loaded()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return bool
     */
    function is_empty()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool $flush
     */
    function clear($flush = \false)
    {
    }
    /**
     * Delete options manager from DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function delete()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string $option
     * @param bool   $flush
     *
     * @return bool
     */
    function has_option($option, $flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string $option
     * @param mixed  $default
     * @param bool   $flush
     *
     * @return mixed
     */
    function get_option($option, $default = \null, $flush = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string $option
     * @param mixed  $value
     * @param bool   $flush
     */
    function set_option($option, $value, $flush = \false)
    {
    }
    /**
     * Unset option.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string $option
     * @param bool   $flush
     */
    function unset_option($option, $flush = \false)
    {
    }
    /**
     * Dump options to database.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    function store()
    {
    }
    /**
     * Get options keys.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @return string[]
     */
    function get_options_keys()
    {
    }
    #--------------------------------------------------------------------------------
    #region Migration
    #--------------------------------------------------------------------------------
    /**
     * Migrate options from site level.
     *
     * @author Vova Feldman (@svovaf)
     * @since  2.0.0
     */
    function migrate_to_network()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Helper Methods
    #--------------------------------------------------------------------------------
    /**
     * @return string
     */
    private function get_option_manager_name()
    {
    }
    #endregion
}
/**
 * This class is responsible for managing the user permissions.
 *
 * @author Vova Feldman (@svovaf)
 * @since 2.5.1
 */
class FS_Permission_Manager
{
    /**
     * @var Freemius
     */
    private $_fs;
    /**
     * @var FS_Storage
     */
    private $_storage;
    /**
     * @var array<number,self>
     */
    private static $_instances = array();
    const PERMISSION_USER = 'user';
    const PERMISSION_SITE = 'site';
    const PERMISSION_EVENTS = 'events';
    const PERMISSION_ESSENTIALS = 'essentials';
    const PERMISSION_DIAGNOSTIC = 'diagnostic';
    const PERMISSION_EXTENSIONS = 'extensions';
    const PERMISSION_NEWSLETTER = 'newsletter';
    /**
     * @param Freemius $fs
     *
     * @return self
     */
    static function instance(\Freemius $fs)
    {
    }
    /**
     * @param Freemius $fs
     */
    protected function __construct(\Freemius $fs)
    {
    }
    /**
     * @return string[]
     */
    static function get_all_permission_ids()
    {
    }
    /**
     * @return string[]
     */
    static function get_api_managed_permission_ids()
    {
    }
    /**
     * @param string $permission
     *
     * @return bool
     */
    static function is_supported_permission($permission)
    {
    }
    /**
     * @since 2.5.3
     *
     * @return bool
     */
    function is_premium_context()
    {
    }
    /**
     * @param bool    $is_license_activation
     * @param array[] $extra_permissions
     *
     * @return array[]
     */
    function get_permissions($is_license_activation, array $extra_permissions = array())
    {
    }
    #--------------------------------------------------------------------------------
    #region Opt-In Permissions
    #--------------------------------------------------------------------------------
    /**
     * @param array[] $extra_permissions
     *
     * @return array[]
     */
    function get_opt_in_permissions(array $extra_permissions = array(), $load_default_from_storage = \false, $is_optional = \false)
    {
    }
    /**
     * @param bool $load_default_from_storage
     *
     * @return array[]
     */
    function get_opt_in_required_permissions($load_default_from_storage = \false)
    {
    }
    /**
     * @param bool $load_default_from_storage
     * @param bool $is_optional
     *
     * @return array[]
     */
    function get_opt_in_optional_permissions($load_default_from_storage = \false, $is_optional = \false)
    {
    }
    /**
     * @param bool $load_default_from_storage
     * @param bool $is_optional
     *
     * @return array[]
     */
    function get_opt_in_diagnostic_permissions($load_default_from_storage = \false, $is_optional = \false)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region License Activation Permissions
    #--------------------------------------------------------------------------------
    /**
     * @param array[] $extra_permissions
     *
     * @return array[]
     */
    function get_license_activation_permissions(array $extra_permissions = array(), $include_optional_label = \true)
    {
    }
    /**
     * @param bool $load_default_from_storage
     *
     * @return array[]
     */
    function get_license_required_permissions($load_default_from_storage = \false)
    {
    }
    /**
     * @return array[]
     */
    function get_license_optional_permissions($include_optional_label = \false, $load_default_from_storage = \false)
    {
    }
    /**
     * @param bool $include_optional_label
     * @param bool $load_default_from_storage
     *
     * @return array
     */
    function get_diagnostic_permission($include_optional_label = \false, $load_default_from_storage = \false)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Common Permissions
    #--------------------------------------------------------------------------------
    /**
     * @param bool $is_license_activation
     * @param bool $include_optional_label
     * @param bool $load_default_from_storage
     *
     * @return array
     */
    function get_extensions_permission($is_license_activation, $include_optional_label = \false, $load_default_from_storage = \false)
    {
    }
    /**
     * @param bool $load_default_from_storage
     *
     * @return array
     */
    function get_user_permission($load_default_from_storage = \false)
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Optional Permissions
    #--------------------------------------------------------------------------------
    /**
     * @return array[]
     */
    function get_newsletter_permission()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Permissions Storage
    #--------------------------------------------------------------------------------
    /**
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_extensions_tracking_allowed($blog_id = \null)
    {
    }
    /**
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_essentials_tracking_allowed($blog_id = \null)
    {
    }
    /**
     * @param bool $default
     *
     * @return bool
     */
    function is_diagnostic_tracking_allowed($default = \true)
    {
    }
    /**
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_homepage_url_tracking_allowed($blog_id = \null)
    {
    }
    /**
     * @param int|null $blog_id
     *
     * @return bool
     */
    function update_site_tracking($is_enabled, $blog_id = \null, $only_if_not_set = \false)
    {
    }
    /**
     * @param string   $permission
     * @param bool     $default
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_permission_allowed($permission, $default = \false, $blog_id = \null)
    {
    }
    /**
     * @param string   $permission
     * @param bool     $is_allowed
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_permission($permission, $is_allowed, $blog_id = \null)
    {
    }
    /**
     * @param string   $permission
     * @param int|null $blog_id
     *
     * @return bool
     */
    function is_permission_set($permission, $blog_id = \null)
    {
    }
    /**
     * @param string[] $permissions
     * @param bool     $is_allowed
     *
     * @return bool `true` if all given permissions are in sync with `$is_allowed`.
     */
    function are_permissions($permissions, $is_allowed, $blog_id = \null)
    {
    }
    /**
     * @param string   $permission
     * @param bool     $is_enabled
     * @param int|null $blog_id
     *
     * @return bool `false` if permission not supported or `$is_enabled` is not a boolean.
     */
    function update_permission_tracking_flag($permission, $is_enabled, $blog_id = \null)
    {
    }
    /**
     * @param array<string,bool> $permissions
     */
    function update_permissions_tracking_flag($permissions)
    {
    }
    #endregion
    /**
     * @param string $permission
     *
     * @return bool
     */
    function get_permission_default($permission)
    {
    }
    /**
     * @return string
     */
    function get_site_permission_name()
    {
    }
    /**
     * @return string[]
     */
    function get_site_tracking_permission_names()
    {
    }
    #--------------------------------------------------------------------------------
    #region Rendering
    #--------------------------------------------------------------------------------
    /**
     * @param array $permission
     */
    function render_permission(array $permission)
    {
    }
    /**
     * @param array $permissions_group
     */
    function render_permissions_group(array $permissions_group)
    {
    }
    function require_permissions_js()
    {
    }
    #endregion
    #--------------------------------------------------------------------------------
    #region Helper Methods
    #--------------------------------------------------------------------------------
    /**
     * @param string $id
     * @param string $dashicon
     * @param string $label
     * @param string $desc
     * @param string $tooltip
     * @param int    $priority
     * @param bool   $is_optional
     * @param bool   $is_on_by_default
     * @param bool   $load_from_storage
     *
     * @return array
     */
    private function get_permission($id, $dashicon, $label, $desc, $tooltip = '', $priority = 10, $is_optional = \false, $is_on_by_default = \true, $load_from_storage = \false)
    {
    }
    /**
     * @param array $permissions
     *
     * @return array[]
     */
    private function get_sorted_permissions_by_priority(array $permissions)
    {
    }
    #endregion
}
class FS_Plan_Manager
{
    /**
     * @var FS_Plan_Manager
     */
    private static $_instance;
    /**
     * @return FS_Plan_Manager
     */
    static function instance()
    {
    }
    private function __construct()
    {
    }
    /**
     * @param FS_Plugin_License[] $licenses
     *
     * @return bool
     */
    function has_premium_license($licenses)
    {
    }
    /**
     * Check if plugin has any paid plans.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param FS_Plugin_Plan[] $plans
     *
     * @return bool
     */
    function has_paid_plan($plans)
    {
    }
    /**
     * Check if plugin has any free plan, or is it premium only.
     *
     * Note: If no plans configured, assume plugin is free.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param FS_Plugin_Plan[] $plans
     *
     * @return bool
     */
    function has_free_plan($plans)
    {
    }
    /**
     * Find all plans that have trial.
     * Since 2.6.2 call get_filtered_plan
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_Plugin_Plan[] $plans
     *
     * @return FS_Plugin_Plan[]
     */
    function get_trial_plans($plans)
    {
    }
    /**
     * Find all plans that are not hidden and have trial.
     *
     * @author Daniele Alessandra (@danielealessandra)
     *
     * @param FS_Plugin_Plan[] $plans
     *
     * @return FS_Plugin_Plan[]
     * @since  2.6.3
     *
     */
    function get_visible_trial_plans($plans)
    {
    }
    /**
     * Find all plans filtered by trial or visibility.
     *
     * @author Daniele Alessandra (@danielealessandra)
     *
     * @param FS_Plugin_Plan[] $plans
     * @param boolean          $should_have_trials
     * @param boolean          $should_be_visible
     *
     * @return FS_Plugin_Plan[]
     * @since  2.6.3
     *
     */
    function get_filtered_plans($plans, $should_have_trials = \false, $should_be_visible = \false)
    {
    }
    /**
     * Check if plugin has any trial plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_Plugin_Plan[] $plans
     *
     * @return bool
     */
    function has_trial_plan($plans)
    {
    }
}
class FS_Plugin_Manager
{
    /**
     * @since 1.2.2
     *
     * @var string|number
     */
    protected $_module_id;
    /**
     * @since 1.2.2
     *
     * @var FS_Plugin
     */
    protected $_module;
    /**
     * @var FS_Plugin_Manager[]
     */
    private static $_instances = array();
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * Option names
     *
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     */
    const OPTION_NAME_PLUGINS = 'plugins';
    const OPTION_NAME_THEMES = 'themes';
    /**
     * @param  string|number $module_id
     *
     * @return FS_Plugin_Manager
     */
    static function instance($module_id)
    {
    }
    /**
     * @param string|number $module_id
     */
    protected function __construct($module_id)
    {
    }
    protected function get_option_manager()
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     * @since  1.2.2
     *
     * @param  string|bool $module_type "plugin", "theme", or "false" for all modules.
     *
     * @return array
     */
    protected function get_all_modules($module_type = \false)
    {
    }
    /**
     * Load plugin data from local DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function load()
    {
    }
    /**
     * Store plugin on local DB.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool|FS_Plugin $module
     * @param bool           $flush
     *
     * @return bool|\FS_Plugin
     */
    function store($module = \false, $flush = \true)
    {
    }
    /**
     * Update local plugin data if different.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param \FS_Plugin $plugin
     * @param bool       $store
     *
     * @return bool True if plugin was updated.
     */
    function update(\FS_Plugin $plugin, $store = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param FS_Plugin $plugin
     * @param bool      $store
     */
    function set(\FS_Plugin $plugin, $store = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return bool|\FS_Plugin
     */
    function get()
    {
    }
}
/**
 * Thrown when an API call returns an exception.
 *
 */
class Freemius_Exception extends \Exception
{
    protected $_result;
    protected $_type;
    protected $_code;
    /**
     * Make a new API Exception with the given result.
     *
     * @param array $result The result from the API server.
     */
    public function __construct($result)
    {
    }
    /**
     * Return the associated result object returned by the API server.
     *
     * @return array The result from the API server
     */
    public function getResult()
    {
    }
    public function getStringCode()
    {
    }
    public function getType()
    {
    }
    /**
     * To make debugging easier.
     *
     * @return string The string representation of the error
     */
    public function __toString()
    {
    }
}
class Freemius_InvalidArgumentException extends \Freemius_Exception
{
}
class Freemius_ArgumentNotExistException extends \Freemius_InvalidArgumentException
{
}
class Freemius_EmptyArgumentException extends \Freemius_InvalidArgumentException
{
}
class Freemius_OAuthException extends \Freemius_Exception
{
    public function __construct($pResult)
    {
    }
}
abstract class Freemius_Api_Base
{
    const VERSION = '1.0.4';
    const FORMAT = 'json';
    protected $_id;
    protected $_public;
    protected $_secret;
    protected $_scope;
    protected $_isSandbox;
    /**
     * @param string $pScope     'app', 'developer', 'plugin', 'user' or 'install'.
     * @param number $pID        Element's id.
     * @param string $pPublic    Public key.
     * @param string $pSecret    Element's secret key.
     * @param bool   $pIsSandbox Whether or not to run API in sandbox mode.
     */
    public function Init($pScope, $pID, $pPublic, $pSecret, $pIsSandbox = \false)
    {
    }
    public function IsSandbox()
    {
    }
    function CanonizePath($pPath)
    {
    }
    abstract function MakeRequest($pCanonizedPath, $pMethod = 'GET', $pParams = array());
    /**
     * @param string $pPath
     * @param string $pMethod
     * @param array  $pParams
     *
     * @return object[]|object|null
     */
    private function _Api($pPath, $pMethod = 'GET', $pParams = array())
    {
    }
    public function Api($pPath, $pMethod = 'GET', $pParams = array())
    {
    }
    /**
     * Base64 decoding that does not need to be urldecode()-ed.
     *
     * Exactly the same as PHP base64 encode except it uses
     *   `-` instead of `+`
     *   `_` instead of `/`
     *   No padded =
     *
     * @param string $input Base64UrlEncoded() string
     *
     * @return string
     */
    protected static function Base64UrlDecode($input)
    {
    }
    /**
     * Base64 encoding that does not need to be urlencode()ed.
     *
     * Exactly the same as base64 encode except it uses
     *   `-` instead of `+
     *   `_` instead of `/`
     *
     * @param string $input string
     *
     * @return string Base64 encoded string
     */
    protected static function Base64UrlEncode($input)
    {
    }
}
class Freemius_Api_WordPress extends \Freemius_Api_Base
{
    private static $_logger = array();
    /**
     * @param string      $pScope   'app', 'developer', 'user' or 'install'.
     * @param number      $pID      Element's id.
     * @param string      $pPublic  Public key.
     * @param string|bool $pSecret  Element's secret key.
     * @param bool        $pSandbox Whether or not to run API in sandbox mode.
     */
    public function __construct($pScope, $pID, $pPublic, $pSecret = \false, $pSandbox = \false)
    {
    }
    public static function GetUrl($pCanonizedPath = '', $pIsSandbox = \false)
    {
    }
    #----------------------------------------------------------------------------------
    #region Servers Clock Diff
    #----------------------------------------------------------------------------------
    /**
     * @var int Clock diff in seconds between current server to API server.
     */
    private static $_clock_diff = 0;
    /**
     * Set clock diff for all API calls.
     *
     * @since 1.0.3
     *
     * @param $pSeconds
     */
    public static function SetClockDiff($pSeconds)
    {
    }
    /**
     * Find clock diff between current server to API server.
     *
     * @since 1.0.2
     * @return int Clock diff in seconds.
     */
    public static function FindClockDiff()
    {
    }
    #endregion
    /**
     * @var string http or https
     */
    private static $_protocol = \FS_API__PROTOCOL;
    /**
     * Set API connection protocol.
     *
     * @since 1.0.4
     */
    public static function SetHttp()
    {
    }
    /**
     * Sets API connection protocol to HTTPS.
     *
     * @since 2.5.4
     */
    public static function SetHttps()
    {
    }
    /**
     * @since 1.0.4
     *
     * @return bool
     */
    public static function IsHttps()
    {
    }
    /**
     * Sign request with the following HTTP headers:
     *      Content-MD5: MD5(HTTP Request body)
     *      Date: Current date (i.e Sat, 14 Feb 2016 20:24:46 +0000)
     *      Authorization: FS {scope_entity_id}:{scope_entity_public_key}:base64encode(sha256(string_to_sign,
     *      {scope_entity_secret_key}))
     *
     * @param string $pResourceUrl
     * @param array  $pWPRemoteArgs
     *
     * @return array
     */
    function SignRequest($pResourceUrl, $pWPRemoteArgs)
    {
    }
    /**
     * Generate Authorization request headers:
     *
     *      Content-MD5: MD5(HTTP Request body)
     *      Date: Current date (i.e Sat, 14 Feb 2016 20:24:46 +0000)
     *      Authorization: FS {scope_entity_id}:{scope_entity_public_key}:base64encode(sha256(string_to_sign,
     *      {scope_entity_secret_key}))
     *
     * @author Vova Feldman
     *
     * @param string $pResourceUrl
     * @param string $pMethod
     * @param string $pPostParams
     *
     * @return array
     * @throws Freemius_Exception
     */
    function GenerateAuthorizationParams($pResourceUrl, $pMethod = 'GET', $pPostParams = '')
    {
    }
    /**
     * Get API request URL signed via query string.
     *
     * @since 1.2.3 Stopped using http_build_query(). Instead, use urlencode(). In some environments the encoding of http_build_query() can generate a URL that once used with a redirect, the `&` querystring separator is escaped to `&amp;` which breaks the URL (Added by @svovaf).
     *
     * @param string $pPath
     *
     * @throws Freemius_Exception
     *
     * @return string
     */
    function GetSignedUrl($pPath)
    {
    }
    /**
     * @author Vova Feldman
     *
     * @param string $pUrl
     * @param array  $pWPRemoteArgs
     *
     * @return mixed
     */
    private static function ExecuteRequest($pUrl, &$pWPRemoteArgs)
    {
    }
    /**
     * @author Leo Fajardo (@leorw)
     *
     * @param string $pUrl
     * @param array  $pWPRemoteArgs
     *
     * @return array|WP_Error The response array or a WP_Error on failure.
     */
    static function RemoteRequest($pUrl, $pWPRemoteArgs)
    {
    }
    /**
     * @return array
     */
    static function GetLogger()
    {
    }
    /**
     * @param string        $pCanonizedPath
     * @param string        $pMethod
     * @param array         $pParams
     * @param null|array    $pWPRemoteArgs
     * @param bool          $pIsSandbox
     * @param null|callable $pBeforeExecutionFunction
     *
     * @return object[]|object|null
     *
     * @throws \Freemius_Exception
     */
    private static function MakeStaticRequest($pCanonizedPath, $pMethod = 'GET', $pParams = array(), $pWPRemoteArgs = \null, $pIsSandbox = \false, $pBeforeExecutionFunction = \null)
    {
    }
    /**
     * Makes an HTTP request. This method can be overridden by subclasses if
     * developers want to do fancier things or use something other than wp_remote_request()
     * to make the request.
     *
     * @param string     $pCanonizedPath The URL to make the request to
     * @param string     $pMethod        HTTP method
     * @param array      $pParams        The parameters to use for the POST body
     * @param null|array $pWPRemoteArgs  wp_remote_request options.
     *
     * @return object[]|object|null
     *
     * @throws Freemius_Exception
     */
    public function MakeRequest($pCanonizedPath, $pMethod = 'GET', $pParams = array(), $pWPRemoteArgs = \null)
    {
    }
    /**
     * Sets CURLOPT_IPRESOLVE to CURL_IPRESOLVE_V4 for cURL-Handle provided as parameter
     *
     * @param resource $handle A cURL handle returned by curl_init()
     *
     * @return resource $handle A cURL handle returned by curl_init() with CURLOPT_IPRESOLVE set to
     *                  CURL_IPRESOLVE_V4
     *
     * @link https://gist.github.com/golderweb/3a2aaec2d56125cc004e
     */
    static function CurlResolveToIPv4($handle)
    {
    }
    #----------------------------------------------------------------------------------
    #region Connectivity Test
    #----------------------------------------------------------------------------------
    /**
     * This method exists only for backward compatibility to prevent a fatal error from happening when called from an outdated piece of code.
     *
     * @param mixed $pPong
     *
     * @return bool
     */
    public static function Test($pPong = \null)
    {
    }
    /**
     * Ping API to test connectivity.
     *
     * @return object
     */
    public static function Ping()
    {
    }
    #endregion
    #----------------------------------------------------------------------------------
    #region Connectivity Exceptions
    #----------------------------------------------------------------------------------
    /**
     * @param \WP_Error $pError
     *
     * @return bool
     */
    private static function IsCurlError(\WP_Error $pError)
    {
    }
    /**
     * @param WP_Error $pError
     *
     * @throws Freemius_Exception
     */
    private static function ThrowWPRemoteException(\WP_Error $pError)
    {
    }
    /**
     * @param string $pResult
     *
     * @throws Freemius_Exception
     */
    private static function ThrowCloudFlareDDoSException($pResult = '')
    {
    }
    /**
     * @param string $pResult
     *
     * @throws Freemius_Exception
     */
    private static function ThrowSquidAclException($pResult = '')
    {
    }
    #endregion
}
/**
 * Get object's public variables.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.0.0
 *
 * @param object $object
 *
 * @return array
 */
function fs_get_object_public_vars($object)
{
}
function fs_dummy()
{
}
function fs_get_url_daily_cache_killer()
{
}
function fs_get_template_path($path)
{
}
function fs_include_template($path, &$params = \null)
{
}
function fs_include_once_template($path, &$params = \null)
{
}
function fs_require_template($path, &$params = \null)
{
}
function fs_require_once_template($path, &$params = \null)
{
}
function fs_get_template($path, &$params = \null)
{
}
/**
 * Generates an absolute URL to the given path. This function ensures that the URL will be correct whether the asset
 * is inside a plugin's folder or a theme's folder.
 *
 * Examples:
 * 1. "themes" folder
 *    Path: C:/xampp/htdocs/fswp/wp-content/themes/twentytwelve/freemius/assets/css/admin/common.css
 *    URL: http://fswp:8080/wp-content/themes/twentytwelve/freemius/assets/css/admin/common.css
 *
 * 2. "plugins" folder
 *    Path: C:/xampp/htdocs/fswp/wp-content/plugins/rating-widget-premium/freemius/assets/css/admin/common.css
 *    URL: http://fswp:8080/wp-content/plugins/rating-widget-premium/freemius/assets/css/admin/common.css
 *
 * @author Leo Fajardo (@leorw)
 * @since  1.2.2
 *
 * @param  string $asset_abs_path Asset's absolute path.
 *
 * @return string Asset's URL.
 */
function fs_asset_url($asset_abs_path)
{
}
function fs_enqueue_local_style($handle, $path, $deps = array(), $ver = \false, $media = 'all')
{
}
function fs_enqueue_local_script($handle, $path, $deps = array(), $ver = \false, $in_footer = \true)
{
}
function fs_img_url($path, $img_dir = \WP_FS__DIR_IMG)
{
}
/**
 * A helper function to fetch GET/POST user input with an optional default value when the input is not set.
 * This function does not do sanitization. It is up to the caller to properly sanitize and validate the input.
 *
 * The return of this function is always unslashed.
 *
 * @since 2.5.10
 *
 * @param string      $key
 * @param mixed       $def
 * @param string|bool $type When set to 'get', it will look for the value passed via query string. When
 *                          set to 'post', it will look for the value passed via the POST request's body. Otherwise,
 *                          it will check if the parameter was passed using any of the mentioned two methods.
 *
 * @return mixed
 */
function fs_request_get_raw($key, $def = \false, $type = \false)
{
}
/**
 * Sanitizes input recursively (if an array).
 *
 * @param mixed $input
 *
 * @return mixed
 * @uses  sanitize_text_field()
 * @since 2.5.10
 */
function fs_sanitize_input($input)
{
}
/**
 * A helper method to fetch GET/POST user input with an optional default value when the input is not set.
 *
 * @author Vova Feldman (@svovaf)
 *
 * @note The return value is always sanitized with sanitize_text_field().
 *
 * @param string      $key
 * @param mixed       $def
 * @param string|bool $type Since 1.2.1.7 - when set to 'get' will look for the value passed via querystring, when
 *                          set to 'post' will look for the value passed via the POST request's body, otherwise,
 *                          will check if the parameter was passed in any of the two.
 *
 *
 * @return mixed
 */
function fs_request_get($key, $def = \false, $type = \false)
{
}
function fs_request_has($key)
{
}
/**
 * A helper method to fetch GET/POST user boolean input with an optional default value when the input is not set.
 *
 * @author Vova Feldman (@svovaf)
 *
 * @param string $key
 * @param bool $def
 *
 * @return bool|mixed
 */
function fs_request_get_bool($key, $def = \false)
{
}
function fs_request_is_post()
{
}
function fs_request_is_get()
{
}
function fs_get_action($action_key = 'action')
{
}
function fs_request_is_action($action, $action_key = 'action')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.0.0
 *
 * @since  1.2.1.5 Allow nonce verification.
 *
 * @param string $action
 * @param string $action_key
 * @param string $nonce_key
 *
 * @return bool
 */
function fs_request_is_action_secure($action, $action_key = 'action', $nonce_key = 'nonce')
{
}
function fs_is_plugin_page($page_slug)
{
}
/**
 * Retrieves unvalidated referer from '_wp_http_referer' or HTTP referer.
 *
 * Do not use for redirects, use {@see wp_get_referer()} instead.
 *
 * @since 1.2.3
 *
 * @return string|false Referer URL on success, false on failure.
 */
function fs_get_raw_referer()
{
}
/**
 * @param number      $module_id
 * @param string      $page
 * @param string      $action
 * @param string      $title
 * @param string      $button_class
 * @param array       $params
 * @param bool        $is_primary
 * @param bool        $is_small
 * @param string|bool $icon_class   Optional class for an icon (since 1.1.7).
 * @param string|bool $confirmation Optional confirmation message before submit (since 1.1.7).
 * @param string      $method       Since 1.1.7
 *
 * @uses fs_ui_get_action_button()
 */
function fs_ui_action_button($module_id, $page, $action, $title, $button_class = '', $params = array(), $is_primary = \true, $is_small = \false, $icon_class = \false, $confirmation = \false, $method = 'GET')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.1.7
 *
 * @param number      $module_id
 * @param string      $page
 * @param string      $action
 * @param string      $title
 * @param string      $button_class
 * @param array       $params
 * @param bool        $is_primary
 * @param bool        $is_small
 * @param string|bool $icon_class   Optional class for an icon.
 * @param string|bool $confirmation Optional confirmation message before submit.
 * @param string      $method
 *
 * @return string
 */
function fs_ui_get_action_button($module_id, $page, $action, $title, $button_class = '', $params = array(), $is_primary = \true, $is_small = \false, $icon_class = \false, $confirmation = \false, $method = 'GET')
{
}
function fs_ui_action_link($module_id, $page, $action, $title, $params = array())
{
}
/**
 * @author Leo Fajardo (@leorw)
 * @since 2.3.1
 *
 * @param mixed  $entity
 * @param string $class
 *
 * @return FS_Plugin|FS_User|FS_Site|FS_Plugin_License|FS_Plugin_Plan|FS_Plugin_Tag|FS_Subscription
 */
function fs_get_entity($entity, $class)
{
}
/**
 * @author Leo Fajardo (@leorw)
 * @since 2.3.1
 *
 * @param mixed  $entities
 * @param string $class_name
 *
 * @return FS_Plugin[]|FS_User[]|FS_Site[]|FS_Plugin_License[]|FS_Plugin_Plan[]|FS_Plugin_Tag[]|FS_Subscription[]
 */
function fs_get_entities($entities, $class_name)
{
}
/**
 * Retrieve URL with nonce added to URL query.
 *
 * Originally was using `wp_nonce_url()` but the new version
 * changed the return value to escaped URL, that's not the expected
 * behaviour.
 *
 * @author Vova Feldman (@svovaf)
 * @since  ~1.1.3
 *
 * @param string     $actionurl URL to add nonce action.
 * @param int|string $action    Optional. Nonce action name. Default -1.
 * @param string     $name      Optional. Nonce name. Default '_wpnonce'.
 *
 * @return string Escaped URL with nonce action added.
 */
function fs_nonce_url($actionurl, $action = -1, $name = '_wpnonce')
{
}
/**
 * Returns the query parameters of the given URL if there are any.
 *
 * @param string $url
 * @param bool   $html_entity_decode
 *
 * @return array<string, string> Key value pair where key represents the parameter name and value represents the parameter value.
 */
function fs_parse_url_params($url, $html_entity_decode = \false)
{
}
/**
 * Check if string starts with.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.3
 *
 * @param string $haystack
 * @param string $needle
 *
 * @return bool
 */
function fs_starts_with($haystack, $needle)
{
}
/**
 * Check if string ends with.
 *
 * @author Vova Feldman (@svovaf)
 * @since  2.0.0
 *
 * @param string $haystack
 * @param string $needle
 *
 * @return bool
 */
function fs_ends_with($haystack, $needle)
{
}
function fs_strip_url_protocol($url)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.1.3
 *
 * @param string $url
 * @param bool   $omit_host
 * @param array  $ignore_params
 *
 * @return string
 */
function fs_canonize_url($url, $omit_host = \false, $ignore_params = array())
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.1.3
 *
 * @param array $params
 * @param array $ignore_params
 * @param bool  $params_prefix
 *
 * @return string
 */
function fs_canonize_query_string(array $params, array &$ignore_params, $params_prefix = \false)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.1.3
 *
 * @param string|string[] $input
 *
 * @return array|mixed|string
 */
function fs_urlencode_rfc3986($input)
{
}
/**
 * @author Vova Feldman (@svovaf)
 *
 * @since  1.2.2 Changed to usage of WP_Filesystem_Direct.
 *
 * @param string $from URL
 * @param string $to   File path.
 *
 * @return bool Is successfully downloaded.
 */
function fs_download_image($from, $to)
{
}
/**
 * Sorts an array by the value of the priority key.
 *
 * @author Daniel Iser (@danieliser)
 * @since  1.1.7
 *
 * @param $a
 * @param $b
 *
 * @return int
 */
function fs_sort_by_priority($a, $b)
{
}
/**
 * Retrieve a translated text by key.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.1.7
 *
 * @param string $key
 * @param string $slug
 *
 * @return string
 *
 * @global       $fs_text_overrides
 */
function fs_text($key, $slug = 'freemius')
{
}
#region Private
/**
 * Retrieve an inline translated text by key with a context.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return string
 *
 * @global       $fs_text_overrides
 */
function _fs_text_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
#endregion
/**
 * Retrieve an inline translated text by key with a context.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return string
 *
 * @global       $fs_text_overrides
 */
function fs_text_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * Output a translated text by key.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.1.7
 *
 * @param string $key
 * @param string $slug
 */
function fs_echo($key, $slug = 'freemius')
{
}
/**
 * Output an inline translated text.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 */
function fs_echo_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * Output an inline translated text with a context.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 */
function fs_echo_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * Get a translatable text override if exists, or `false`.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.1.7
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string|false
 */
function fs_text_override($text, $key, $slug)
{
}
/**
 * Get a translatable text and its text domain.
 *
 * When the text is overridden by the module, returns the overridden text and the text domain of the module. Otherwise, returns the original text and 'freemius' as the text domain.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.1.7
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string[]
 */
function fs_text_and_domain($text, $key, $slug)
{
}
/**
 * Retrieve an inline translated text by key.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string
 *
 * @global       $fs_text_overrides
 */
function _fs_text_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * Retrieve an inline translated text by key.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string
 *
 * @global       $fs_text_overrides
 */
function fs_text_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 *
 * @return string
 */
function fs_esc_attr($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string
 */
function fs_esc_attr_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return string
 */
function fs_esc_attr_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 */
function fs_esc_attr_echo($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 */
function fs_esc_attr_echo_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 *
 * @return string
 */
function fs_esc_js($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string
 */
function fs_esc_js_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return string
 */
function fs_esc_js_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return void
 */
function fs_esc_js_echo_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 */
function fs_esc_js_echo($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 */
function fs_esc_js_echo_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 */
function fs_json_encode_echo($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 */
function fs_json_encode_echo_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 *
 * @return string
 */
function fs_esc_html($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 *
 * @return string
 */
function fs_esc_html_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 *
 * @return string
 */
function fs_esc_html_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text    Translatable string.
 * @param string $context Context information for the translators.
 * @param string $key     String key for overrides.
 * @param string $slug    Module slug for overrides.
 */
function fs_esc_html_echo_x_inline($text, $context, $key = '', $slug = 'freemius')
{
}
/**
 * @author Vova Feldman
 * @since  1.2.1.6
 *
 * @param string $key
 * @param string $slug
 */
function fs_esc_html_echo($key, $slug)
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  1.2.3
 *
 * @param string $text Translatable string.
 * @param string $key  String key for overrides.
 * @param string $slug Module slug for overrides.
 */
function fs_esc_html_echo_inline($text, $key = '', $slug = 'freemius')
{
}
/**
 * Override default i18n text phrases.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.6
 *
 * @param array[string]string $key_value
 * @param string              $slug
 *
 * @global $fs_text_overrides
 */
function fs_override_i18n(array $key_value, $slug = 'freemius')
{
}
/**
 * @author Vova Feldman (@svovaf)
 * @since  2.0.0
 */
function fs_is_plugin_uninstall()
{
}
/**
 * Unlike is_network_admin(), this one will also work properly when
 * the context execution is WP AJAX handler, and during plugin
 * uninstall.
 *
 * @author Vova Feldman (@svovaf)
 * @since  2.0.0
 */
function fs_is_network_admin()
{
}
/**
 * Unlike is_blog_admin(), this one will also work properly when
 * the context execution is WP AJAX handler, and during plugin
 * uninstall.
 *
 * @author Vova Feldman (@svovaf)
 * @since  2.0.0
 */
function fs_is_blog_admin()
{
}
/**
 * Apply filter for specific plugin.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.0.9
 *
 * @param string $module_unique_affix Module's unique affix.
 * @param string $tag                 The name of the filter hook.
 * @param mixed  $value               The value on which the filters hooked to `$tag` are applied on.
 *
 * @return mixed The filtered value after all hooked functions are applied to it.
 *
 * @uses   apply_filters()
 */
function fs_apply_filter($module_unique_affix, $tag, $value)
{
}
/**
 * Gets the value of an optional constant. If the constant is not defined, the default value will be returned.
 *
 * @author Swashata Ghosh (@swashata)
 * @since 2.5.12.5
 *
 * @param string $constant_name
 * @param mixed $default_value
 *
 * @return mixed
 */
function fs_get_optional_constant($constant_name, $default_value = \null)
{
}
/**
 * Redirects to another page, with a workaround for the IIS Set-Cookie bug.
 *
 * @link  http://support.microsoft.com/kb/q176113/
 * @since 1.5.1
 * @uses  apply_filters() Calls 'wp_redirect' hook on $location and $status.
 *
 * @param string $location The path to redirect to.
 * @param bool   $exit     If true, exit after redirect (Since 1.2.1.5).
 * @param int    $status   Status code to use.
 *
 * @return bool False if $location is not set
 */
function fs_redirect($location, $exit = \true, $status = 302)
{
}
/**
 * Get server IP.
 *
 * @since 2.5.1 This method returns the server IP.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.2
 *
 * @return string|null
 */
function fs_get_ip()
{
}
/**
 * Leverage backtrace to find caller plugin main file path.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.0.6
 *
 * @return string
 */
function fs_find_caller_plugin_file()
{
}
/**
 * Update SDK newest version reference.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.6
 *
 * @param string      $sdk_relative_path
 * @param string|bool $plugin_file
 *
 * @global            $fs_active_plugins
 */
function fs_update_sdk_newest_version($sdk_relative_path, $plugin_file = \false)
{
}
/**
 * Reorder the plugins load order so the plugin with the newest Freemius SDK is loaded first.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.6
 *
 * @return bool Was plugin order changed. Return false if plugin was loaded first anyways.
 *
 * @global $fs_active_plugins
 */
function fs_newest_sdk_plugin_first()
{
}
/**
 * Go over all Freemius SDKs in the system and find and "remember"
 * the newest SDK which is associated with an active plugin.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.6
 *
 * @global $fs_active_plugins
 */
function fs_fallback_to_newest_active_sdk()
{
}
/**
 * Get the allowed KSES list for sanitizing HTML output on the template files.
 *
 * @return array
 */
function fs_html_get_allowed_kses_list()
{
}
/**
 * Gets an HTML class attribute value.
 *
 * @param string|string[] $classes
 *
 * @return string
 */
function fs_html_get_classname($classes)
{
}
/**
 * Gets a properly escaped HTML attributes string from an associative array.
 *
 * @param array<string, string> $attributes A key/value pair array of attributes.
 *
 * @return string
 */
function fs_html_get_attributes($attributes)
{
}
/**
 * Get sanitized HTML for template files.
 *
 * @param string $raw_html
 *
 * @return string
 * @since 2.5.10
 */
function fs_html_get_sanitized_html($raw_html)
{
}
/**
 * Retrieve the translation of $text.
 *
 * @since 1.2.1.6
 *
 * @param string $text
 * 
 * @return string
 */
function _fs_text($text)
{
}
/**
 * Retrieve translated string with gettext context.
 *
 * Quite a few times, there will be collisions with similar translatable text
 * found in more than two places, but with different translated context.
 *
 * By including the context in the pot file, translators can translate the two
 * strings differently.
 *
 * @since 1.2.1.6
 *
 * @param string $text
 * @param string $context 
 * 
 * @return string
 */
function _fs_x($text, $context)
{
}
/**
 * Find the plugin main file path based on any given file inside the plugin's folder.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.7.1
 *
 * @param string $file Absolute path to a file inside a plugin's folder.
 *
 * @return string
 */
function fs_find_direct_caller_plugin_file($file)
{
}
/**
 * @author Leo Fajardo (@leorw)
 * @since 2.2.1
 *
 * @param bool $delete_cache
 *
 * @return array
 */
function fs_get_plugins($delete_cache = \false)
{
}
function fs_migrate_251(\Freemius $fs, $install_by_blog_id)
{
}
/**
 * Quick shortcut to get Freemius for specified plugin.
 * Used by various templates.
 *
 * @param number $module_id
 *
 * @return Freemius
 */
function freemius($module_id)
{
}
/**
 * @param string $slug
 * @param number $plugin_id
 * @param string $public_key
 * @param bool   $is_live    Is live or test plugin.
 * @param bool   $is_premium Hints freemius if running the premium plugin or not.
 *
 * @return Freemius
 *
 * @deprecated Please use fs_dynamic_init().
 */
function fs_init($slug, $plugin_id, $public_key, $is_live = \true, $is_premium = \true)
{
}
/**
 * @param array <string,string|bool|array> $module Plugin or Theme details.
 *
 * @return Freemius
 * @throws Freemius_Exception
 */
function fs_dynamic_init($module)
{
}
function fs_dump_log()
{
}