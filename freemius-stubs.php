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
    #region Identity ------------------------------------------------------------------
    /**
     * Check if user registered with Freemius by connecting his account.
     *
     * @since 1.0.1
     * @return bool
     */
    abstract function is_registered();
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
    #endregion Identity ------------------------------------------------------------------
    #region Permissions ------------------------------------------------------------------
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
    #endregion Permissions ------------------------------------------------------------------
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
    #region Premium Only ------------------------------------------------------------------
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
     * @param string $plan  Plan name
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
     * @param string $plan  Plan name
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
    #endregion Premium Only ------------------------------------------------------------------
    #region Trial ------------------------------------------------------------------
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
    #endregion Trial ------------------------------------------------------------------
    #region Plans ------------------------------------------------------------------
    /**
     * Check if plugin using the free plan.
     *
     * @since 1.0.4
     *
     * @return bool
     */
    abstract function is_free_plan();
    /**
     * @since  1.0.2
     *
     * @param string $plan  Plan name
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
     * @param string $plan  Plan name
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
     * @param string $plan  Plan name
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
    #endregion Plans ------------------------------------------------------------------
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
     * @param string $period Billing cycle
     *
     * @return string
     */
    abstract function get_upgrade_url($period = \WP_FS__PERIOD_ANNUALLY);
    #region Marketing ------------------------------------------------------------------
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
    #endregion ------------------------------------------------------------------
}
// "final class" only supported since PHP 5.
class Freemius extends \Freemius_Abstract
{
    /**
     * SDK Version
     *
     * @var string
     */
    public $version = '1.1.4';
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
     * @var bool Hints the SDK if plugin can support anonymous mode (if skip connect is visible).
     */
    private $_enable_anonymous;
    /**
     * @since 1.0.8
     * @var bool Hints the SDK if the plugin has any paid plans.
     */
    private $_has_paid_plans;
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
     * @var FS_Key_Value_Storage
     */
    private $_storage;
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
     * @var FS_Plugin
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
     * @var FS_Admin_Notice_Manager
     */
    private $_admin_notices;
    /**
     * @var FS_Logger
     * @since 1.0.0
     */
    private static $_static_logger;
    /**
     * @var FS_Option_Manager
     * @since 1.0.2
     */
    private static $_accounts;
    /**
     * @var Freemius[]
     */
    private static $_instances = array();
    /* Ctor
    ------------------------------------------------------------------------------------------------------------------*/
    private function __construct($slug)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _version_updates_handler()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _register_hooks()
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
     * Displays a confirmation and feedback dialog box when the user clicks on the "Deactivate" link on the plugins
     * page.
     *
     * @author Vova Feldman (@svovaf)
     * @author Leo Fajardo (@leorw)
     * @since  1.1.2
     */
    function _add_deactivation_feedback_dialog_box()
    {
    }
    /**
     * @author Leo Fajardo (leorw)
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
    /**
     * Leverage backtrace to find caller plugin file path.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return string
     */
    private function _find_caller_plugin_file()
    {
    }
    #region Instance ------------------------------------------------------------------
    /**
     * Main singleton instance.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @param $slug
     *
     * @return Freemius
     */
    static function instance($slug)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string|number $slug_or_id
     *
     * @return bool
     */
    private static function has_instance($slug_or_id)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param $id
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
     * @param $plugin_file
     *
     * @return false|Freemius
     */
    static function get_instance_by_file($plugin_file)
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
     * @param $slug_or_id
     *
     * @return bool|Freemius
     */
    function get_addon_instance($slug_or_id)
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
     * @return bool
     */
    function is_activation_mode()
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
    #region Debugging ------------------------------------------------------------------
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    static function add_debug_page()
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    static function _debug_page_render()
    {
    }
    #endregion ------------------------------------------------------------------
    #region Connectivity Issues ------------------------------------------------------------------
    /**
     * Check if Freemius should be turned on for the current plugin install + version combination. The API query
     * will be only invoked once per plugin version (cached locally).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    private function is_on()
    {
    }
    /**
     * Check if there's any connectivity issue to Freemius API.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    private function has_api_connectivity()
    {
    }
    /**
     * Anonymous and unique site identifier (Hash).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.0
     *
     * @return string
     */
    function get_anonymous_id()
    {
    }
    /**
     * Generate API connectivity issue message.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param mixed $api_result
     */
    function _add_connectivity_issue_message($api_result)
    {
    }
    /**
     * Get collection of all active plugins.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return array[string]array
     */
    private function get_active_plugins()
    {
    }
    /**
     * Handle user request to resolve connectivity issue.
     * This method will send an email to Freemius API technical staff for resolution.
     * The email will contain server's info and installed plugins (might be caching issue).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function _email_about_firewall_issue()
    {
    }
    static function _add_firewall_issues_javascript()
    {
    }
    #endregion Connectivity Issues ------------------------------------------------------------------
    #region Email ------------------------------------------------------------------
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
    #endregion Email ------------------------------------------------------------------
    #region Initialization ------------------------------------------------------------------
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
    private function _get_option(&$options, $key, $default = \false)
    {
    }
    private function _get_bool_option(&$options, $key, $default = \false)
    {
    }
    private function _get_numeric_option(&$options, $key, $default = \false)
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
     * Handles plugin's code type change (free <--> premium).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function _plugin_code_type_changed()
    {
    }
    #endregion Initialization ------------------------------------------------------------------
    #region Add-ons -------------------------------------------------------------------------
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
     * Check if add-on installed and activated on site.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string|number $slug_or_id
     *
     * @return bool
     */
    function is_addon_activated($slug_or_id)
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
     * @param string $slug
     *
     * @return bool
     */
    function is_addon_installed($slug)
    {
    }
    /**
     * Get add-on basename.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string $slug
     *
     * @return string
     */
    function get_addon_basename($slug)
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
    #endregion ------------------------------------------------------------------
    #region Sandbox ------------------------------------------------------------------
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
    #endregion Sandbox ------------------------------------------------------------------
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
     * Check if plugin must be WordPress.org compliant.
     *
     * @since 1.0.7
     *
     * @return bool
     */
    function is_org_repo_compliant()
    {
    }
    /**
     * Background sync every 24 hours.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @return bool If function actually executed the sync in this iteration.
     */
    private function _background_sync()
    {
    }
    /**
     * Show a notice that activation is currently pending.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param bool|string $email
     */
    function _add_pending_activation_notice($email = \false)
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
     * Return current page's URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @return string
     */
    function current_page_url()
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
     * @param bool $store
     */
    function _delete_site($store = \true)
    {
    }
    /**
     * Delete plugin's plans information.
     *
     * @param bool $store Flush to Database if true.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    private function _delete_plans($store = \true)
    {
    }
    /**
     * Delete all plugin licenses.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param bool        $store
     * @param string|bool $plugin_slug
     */
    private function _delete_licenses($store = \true, $plugin_slug = \false)
    {
    }
    /**
     * Plugin activated hook.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     * @uses   FS_Api
     */
    function _activate_plugin_event_hook()
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
     * @since  1.1.3
     *
     * @param bool $is_anonymous
     */
    private function set_anonymous_mode($is_anonymous = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     */
    private function reset_anonymous_mode()
    {
    }
    /**
     * Skip account connect, and set anonymous mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     */
    private function skip_connection()
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
     * Update install details.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.2
     *
     * @param string[] string $override
     *
     * @return array
     */
    private function get_install_data_for_api($override = array())
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
     *
     * @return false|object|string
     */
    private function send_install_update($override = array(), $flush = \false)
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
     *
     * @return false|object|string
     */
    private function sync_install($override = array(), $flush = \false)
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
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     *
     * @return string
     */
    private function premium_plugin_basename()
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
    #region Plugin Information ------------------------------------------------------------------
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
     * @return array
     */
    function get_plugin_data()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     *
     * @return string Plugin slug.
     */
    function get_slug()
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
     * @return string
     */
    function get_plugin_name()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @return string
     */
    function get_plugin_version()
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
     * @return FS_User[]
     */
    static function get_all_users()
    {
    }
    /**
     * @return FS_Site[]
     */
    private static function get_all_sites()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return FS_Plugin_License[]
     */
    private static function get_all_licenses()
    {
    }
    /**
     * @return FS_Plugin_Plan[]
     */
    private static function get_all_plans()
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
     * @return FS_Plugin[]|false
     */
    private static function get_all_addons()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return FS_Plugin[]|false
     */
    private static function get_all_account_addons()
    {
    }
    /**
     * Check if user is registered.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     * @return bool
     */
    function is_registered()
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return FS_Plugin[]|false
     */
    function get_addons()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return FS_Plugin[]|false
     */
    function get_account_addons()
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
     * @return FS_Plugin|false
     */
    function get_addon_by_slug($slug)
    {
    }
    #region Plans & Licensing ------------------------------------------------------------------
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return FS_Plugin_Plan
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
     * Check if the user has an activated and valid paid license on current plugin's install.
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return FS_Plugin_License
     */
    function _get_available_premium_license()
    {
    }
    /**
     * Sync local plugin plans with remote server.
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param number $id
     *
     * @return FS_Plugin_Plan
     */
    function _get_plan_by_id($id)
    {
    }
    /**
     * Sync local plugin plans with remote server.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @return FS_Plugin_License[]|object
     */
    function _sync_licenses()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param number $id
     *
     * @return FS_Plugin_License
     */
    function _get_license_by_id($id)
    {
    }
    /**
     * Sync site's license with user licenses.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param FS_Plugin_License|null $new_license
     */
    function _update_site_license($new_license)
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
     * @return bool|\FS_Subscription
     */
    function _get_subscription()
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
    #region URL Generators
    /**
     * Alias to pricing_url().
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     *
     * @uses   pricing_url
     *
     * @param string $period Billing cycle
     *
     * @return string
     */
    function get_upgrade_url($period = \WP_FS__PERIOD_ANNUALLY)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @uses   get_upgrade_url
     *
     * @return string
     */
    function get_trial_url()
    {
    }
    /**
     * Plugin's pricing URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $period Billing cycle
     *
     * @return string
     */
    function pricing_url($period = \WP_FS__PERIOD_ANNUALLY)
    {
    }
    /**
     * Checkout page URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param string      $period Billing cycle
     * @param bool|string $plan_name
     * @param bool|number $plan_id
     * @param bool|int    $licenses
     *
     * @return string
     */
    function checkout_url($period = \WP_FS__PERIOD_ANNUALLY, $plan_name = \false, $plan_id = \false, $licenses = \false)
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
     * @return bool
     */
    function _has_addons()
    {
    }
    /**
     * Check if plugin can work in anonymous mode.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @return bool
     */
    function enable_anonymous()
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
    function is_ajax()
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
     * @param string $page
     * @param array  $params
     *
     * @return string
     */
    function _get_admin_page_url($page = '', $params = array())
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
     * Plugin's account URL.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|string $topic
     * @param bool|string $message
     *
     * @return string
     */
    function contact_url($topic = \false, $message = \false)
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
    private function _encrypt($str)
    {
    }
    private function _decrypt($str)
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
    private function _encrypt_entity(\FS_Entity $entity)
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
    private function _decrypt_entity(\FS_Entity $entity)
    {
    }
    /**
     * Tries to activate account based on POST params.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.2
     */
    function _activate_account()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string $email
     *
     * @return FS_User|bool
     */
    static function _get_user_by_email($email)
    {
    }
    #region Account (Loading, Updates & Activation) ------------------------------------------------------------------
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
     * Set user and site identities.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param FS_User $user
     * @param FS_Site $site
     * @param bool    $redirect
     *
     * @return bool False if account already set.
     */
    function setup_account(\FS_User $user, \FS_Site $site, $redirect = \true)
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
     * Install plugin with current logged WP user info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     */
    function _install_with_current_user()
    {
    }
    /**
     * Tries to activate add-on account based on parent plugin info.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param Freemius $parent_fs
     */
    private function _activate_addon_account(\Freemius $parent_fs)
    {
    }
    #endregion ------------------------------------------------------------------
    #region Admin Menu Items ------------------------------------------------------------------
    private $_menu_items = array();
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
     *
     * @return string
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @return string
     */
    private function get_top_level_menu_slug()
    {
    }
    /**
     * Add default Freemius menu items.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
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
     */
    function add_submenu_item($menu_title, $render_function, $page_title = \false, $capability = 'manage_options', $menu_slug = \false, $before_render_function = \false, $priority = 10, $show_submenu = \true)
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
     *
     */
    function add_submenu_link_item($menu_title, $url, $menu_slug = \false, $capability = 'read', $priority = 10)
    {
    }
    #endregion ------------------------------------------------------------------
    /* Actions / Hooks / Filters
    		------------------------------------------------------------------------------------------------------------------*/
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
    function add_action($tag, $function_to_add, $priority = 10, $accepted_args = 1)
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
    function add_filter($tag, $function_to_add, $priority = 10, $accepted_args = 1)
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
     * @param bool $store Flush to Database if true.
     */
    private function _store_site($store = \true)
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
     * @param string|bool         $plugin_slug
     * @param FS_Plugin_License[] $licenses
     */
    private function _store_licenses($store = \true, $plugin_slug = \false, $licenses = array())
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
     * Store account params in the Database.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.1
     */
    private function _store_account()
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
     * @since  1.0.5
     * @uses   FS_Api
     *
     * @param bool $flush
     *
     * @return object|\FS_Site
     */
    private function _fetch_site($flush = \false)
    {
    }
    /**
     * @param bool $store
     *
     * @return FS_Plugin_Plan|object|false
     */
    private function _enrich_site_plan($store = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     * @uses   FS_Api
     *
     * @param bool $store
     *
     * @return FS_Plugin_Plan|object|false
     */
    private function _enrich_site_trial_plan($store = \true)
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
     * @since  1.0.5
     * @uses   FS_Api
     *
     * @param number|bool $plugin_id
     *
     * @return FS_Plugin_License[]|object
     */
    private function _fetch_licenses($plugin_id = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param FS_Plugin_Plan $plan
     * @param bool           $store
     */
    private function _update_plan($plan, $store = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param FS_Plugin_License[] $licenses
     * @param string|bool         $plugin_slug
     */
    private function _update_licenses($licenses, $plugin_slug = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|number $plugin_id
     *
     * @return object|false New plugin tag info if exist.
     */
    private function _fetch_newer_version($plugin_id = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool|number $plugin_id
     *
     * @return bool|FS_Plugin_Tag
     */
    function get_update($plugin_id = \false)
    {
    }
    /**
     * Check if site assigned with active license.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function has_active_license()
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
     * Sync site's plan.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @uses   FS_Api
     *
     * @param bool $background Hints the method if it's a background sync. If false, it means that was initiated by
     *                         the admin.
     */
    private function _sync_license($background = \false)
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
     * @param bool $background Hints the method if it's a background sync. If false, it means that was initiated by
     *                         the admin.
     */
    private function _sync_plugin_license($background = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param bool $background
     */
    protected function _activate_license($background = \false)
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
     * Site plan downgrade.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @uses   FS_Api
     */
    private function _downgrade_site()
    {
    }
    /**
     * Cancel site trial.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
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
     *
     * @return object|false Plugin latest tag info.
     */
    function _fetch_latest_version($addon_id = \false)
    {
    }
    #region Download Plugin ------------------------------------------------------------------
    /**
     * Download latest plugin version, based on plan.
     * The download will be fetched via the API first.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool|number $plugin_id
     *
     * @uses   FS_Api
     *
     * @deprecated
     */
    private function _download_latest($plugin_id = \false)
    {
    }
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
    private function _download_latest_directly($plugin_id = \false)
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
    private function _get_latest_download_api_url($plugin_id = \false)
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
    private function _get_latest_download_link($label, $plugin_id = \false)
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
     */
    private function _check_updates($background = \false, $plugin_id = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @uses   FS_Api
     *
     */
    private function _sync_addons()
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
    private function _update_email($new_email)
    {
    }
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
     * Start install ownership change.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     * @uses   FS_Api
     *
     * @param string $candidate_email
     *
     * @return bool Is ownership change successfully initiated.
     */
    private function init_change_owner($candidate_email)
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
     * @return string
     */
    private function get_activation_url()
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string $filter Filter name.
     *
     * @return string
     */
    private function get_after_activation_url($filter)
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
     * Account page resources load.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     */
    function _account_page_load()
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
    #region Contact Us ------------------------------------------------------------------
    /**
     * Render contact-us page.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    function _contact_page_render()
    {
    }
    #endregion ------------------------------------------------------------------
    /**
     * Hide all admin notices to prevent distractions.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @uses   remove_all_actions()
     */
    function _hide_admin_notices()
    {
    }
    function _clean_admin_content_section_hook()
    {
    }
    /**
     * Attach to admin_head hook to hide all admin notices.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     */
    function _clean_admin_content_section()
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
    function get_api_site_scope($flush = \false)
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
     * Show trial promotional notice (if any trial exist).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param $plans
     */
    function _check_for_trial_plans($plans)
    {
    }
    /**
     * Show trial promotional notice (if any trial exist).
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     */
    function _add_trial_notice()
    {
    }
    /* Action Links
    		------------------------------------------------------------------------------------------------------------------*/
    private $_action_links_hooked = \false;
    private $_action_links = array();
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.0
     *
     * @return bool
     */
    private function is_plugin_action_links_hooked()
    {
    }
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
    function add_plugin_action_link($label, $url, $external = \false, $priority = 10, $key = \false)
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
    /* Plugin Auto-Updates (@since 1.0.4)
    		------------------------------------------------------------------------------------------------------------------*/
    /**
     * @var string[]
     */
    private static $_auto_updated_plugins;
    /**
     * @todo   TEST IF IT WORKS!!!
     *
     * Include plugins for automatic updates based on stored settings.
     *
     * @see    http://wordpress.stackexchange.com/questions/131394/how-do-i-exclude-plugins-from-getting-automatically-updated/131404#131404
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param bool   $update Whether to update (not used for plugins)
     * @param object $item   The plugin's info
     *
     * @return bool
     */
    static function _include_plugins_in_auto_update($update, $item)
    {
    }
    #region Versioning ------------------------------------------------------------------
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
     *
     * @return bool
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
     *
     * @return bool
     */
    function set_plugin_upgrade_complete()
    {
    }
    #endregion ------------------------------------------------------------------
    #region Marketing ------------------------------------------------------------------
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
    #endregion ------------------------------------------------------------------
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
     * @var FS_Option_Manager API Caching layer
     */
    private static $_cache;
    /**
     * @var int Clock diff in seconds between current server to API server.
     */
    private static $_clock_diff;
    /**
     * @var Freemius_Api
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
     * @param string      $slug
     * @param string      $scope      'app', 'developer', 'user' or 'install'.
     * @param number      $id         Element's id.
     * @param string      $public_key Public key.
     * @param bool        $is_sandbox
     * @param bool|string $secret_key Element's secret key.
     *
     * @return FS_Api
     */
    static function instance($slug, $scope, $id, $public_key, $is_sandbox, $secret_key = \false)
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
     */
    private function __construct($slug, $scope, $id, $public_key, $secret_key, $is_sandbox)
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
     * @param bool   $retry Is in retry or first call attempt.
     *
     * @return array|mixed|string|void
     */
    private function _call($path, $method = 'GET', $params = array(), $retry = \false)
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
    private function get_cache_key($path, $method = 'GET', $params = array())
    {
    }
    /**
     * Test API connectivity.
     *
     * @since  1.0.9 If fails, try to fallback to HTTP.
     *
     * @param null|string $unique_anonymous_id
     *
     * @return bool True if successful connectivity to the API.
     */
    function test($unique_anonymous_id = \null)
    {
    }
    /**
     * Ping API for connectivity test, and return result object.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.9
     *
     * @param null|string $unique_anonymous_id
     *
     * @return object
     */
    function ping($unique_anonymous_id = \null)
    {
    }
    /**
     * Check if valid ping request result.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.1
     *
     * @param mixed $pong
     *
     * @return bool
     */
    function is_valid_ping($pong)
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
}
class FS_Logger
{
    private $_id;
    private $_on = \false;
    private $_echo = \false;
    private $_file_start = 0;
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
    private static function _hook_footer()
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
    private function _log(&$message, $type = 'log', $wrapper)
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
    function entrance($message = '', $wrapper = \false)
    {
    }
    function departure($message = '', $wrapper = \false)
    {
    }
    private static function _format($log, $show_type = \true)
    {
    }
    private static function _format_html($log)
    {
    }
    static function dump()
    {
    }
}
// Uncomment this line for testing.
//	set_site_transient( 'update_plugins', null );
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
    function __construct(\Freemius $freemius)
    {
    }
    /**
     * Initiate required filters.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     */
    private function _filters()
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
     * @param stdClass $transient_data Update array build by WordPress.
     *
     * @return array Modified update array with custom plugin data.
     */
    function pre_set_site_transient_update_plugins_filter($transient_data)
    {
    }
    /**
     * Try to fetch plugin's info from .org repository.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @param string $action
     * @param array  $args
     *
     * @return bool|mixed
     */
    private function _fetch_plugin_info_from_repository($action, $args)
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
}
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
    public static function instance()
    {
    }
    private function __construct()
    {
    }
    function get_secure_token(\FS_Scope_Entity $entity, $timestamp, $action = '')
    {
    }
    function get_context_params(\FS_Scope_Entity $entity, $timestamp = \false, $action = '')
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
     * @param bool|stdClass $entity
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
     * @var number
     */
    public $pricing_id;
    /**
     * @var int
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
     * @author Vova Feldman (@svovaf)
     * @since  1.0.5
     *
     * @return bool
     */
    function is_expired()
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
     * Check if license is fully utilized.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.6
     *
     * @param bool $is_localhost
     *
     * @return bool
     */
    function is_utilized($is_localhost = \null)
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
}
class FS_Plugin_Plan extends \FS_Entity
{
    #region Properties
    /**
     * @var string
     */
    public $title;
    /**
     * @var string
     */
    public $name;
    /**
     * @var int Trial days.
     */
    public $trial_period;
    /**
     * @var string If true, require payment for trial.
     */
    public $is_require_subscription;
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
    public $version;
    public $url;
    function __construct($tag = \false)
    {
    }
    static function get_type()
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
     * @since 1.0.9
     *
     * @var bool
     */
    public $is_live;
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
    static function get_type()
    {
    }
}
class FS_Site extends \FS_Scope_Entity
{
    /**
     * @var string
     */
    public $slug;
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
     * @var string E.g. UTF-8
     */
    public $charset;
    /**
     * @var string Platform version (e.g WordPress version).
     */
    public $platform_version;
    /**
     * @var string Programming language version (e.g PHP version).
     */
    public $programming_language_version;
    /**
     * @var FS_Plugin_Plan $plan
     */
    public $plan;
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
     * @param stdClass|bool $site
     */
    function __construct($site = \false)
    {
    }
    static function get_type()
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
     * @var string|null Datetime of the next payment, or null if cancelled
     */
    public $next_payment;
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
    static function get_type()
    {
    }
}
class FS_Admin_Menu_Manager
{
    #region Properties
    /**
     * @var string
     */
    protected $_plugin_slug;
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
     * @var string[]bool
     */
    private $_default_submenu_items;
    /**
     * @since 1.1.3
     *
     * @var string
     */
    private $_first_time_path;
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
     * @param string $plugin_slug
     *
     * @return FS_Admin_Notice_Manager
     */
    static function instance($plugin_slug)
    {
    }
    protected function __construct($plugin_slug)
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
     * @return string
     */
    function get_first_time_path()
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
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @return string
     */
    //		function slug(){
    //			return $this->_menu_slug;
    //		}
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.1.3
     *
     * @param string $id
     * @param bool   $default
     *
     * @return bool
     */
    function is_submenu_item_visible($id, $default = \true)
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
     * @return bool
     */
    function is_activation_page()
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
     * @return array[string]mixed
     */
    function remove_menu_item()
    {
    }
    /**
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.1.4
     *
     * @param callable $function
     *
     * @return array[string]mixed
     */
    function override_menu_item($function)
    {
    }
    #endregion Top level menu Override
}
class FS_Admin_Notice_Manager
{
    /**
     * @var string
     */
    protected $_slug;
    /**
     * @var string
     */
    protected $_title;
    /**
     * @var array[]
     */
    private $_admin_messages = array();
    /**
     * @var FS_Key_Value_Storage
     */
    private $_sticky_storage;
    /**
     * @var FS_Plugin_Manager[]
     */
    private static $_instances = array();
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @param string $slug
     * @param string $title
     *
     * @return FS_Admin_Notice_Manager
     */
    static function instance($slug, $title = '')
    {
    }
    protected function __construct($slug, $title = '')
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
     * Handle all_admin_notices by printing the admin messages stacked in the queue.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     */
    function _all_admin_notices_hook()
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
     * Add admin message to admin messages queue, and hook to admin_notices / all_admin_notices if not yet hooked.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.4
     *
     * @param string $message
     * @param string $title
     * @param string $type
     * @param bool   $is_sticky
     * @param bool   $all_admin
     * @param string $id Message ID
     * @param bool   $store_if_sticky
     *
     * @uses   add_action()
     */
    function add($message, $title = '', $type = 'success', $is_sticky = \false, $all_admin = \false, $id = '', $store_if_sticky = \true)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.7
     *
     * @param string $ids
     */
    function remove_sticky($ids)
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
     * @param string $message
     * @param string $id Message ID
     * @param string $title
     * @param string $type
     * @param bool   $all_admin
     */
    function add_sticky($message, $id, $title = '', $type = 'success', $all_admin = \false)
    {
    }
    /**
     * Clear all sticky messages.
     *
     * @author Vova Feldman (@svovaf)
     * @since  1.0.8
     */
    function clear_all_sticky()
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
}
class FS_Key_Value_Storage implements \ArrayAccess, \Iterator, \Countable
{
    /**
     * @var string
     */
    protected $_id;
    /**
     * @var string
     */
    protected $_slug;
    /**
     * @var array
     */
    protected $_data;
    /**
     * @var FS_Plugin_Manager[]
     */
    private static $_instances = array();
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @param string $id
     * @param string $slug
     *
     * @return FS_Key_Value_Storage
     */
    static function instance($id, $slug)
    {
    }
    protected function __construct($id, $slug)
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
    function offsetSet($k, $v)
    {
    }
    function offsetExists($k)
    {
    }
    function offsetUnset($k)
    {
    }
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
 * 3-layer lazy options manager.
 *      layer 3: Memory
 *      layer 2: Cache (if there's any caching plugin and if WP_FS__DEBUG_SDK is FALSE)
 *      layer 1: Database (options table). All options stored as one option record in the DB to reduce number of DB
 *      queries.
 *
 * If load() is not explicitly called, starts as empty manager. Same thing about saving the data - you have to
 * explicitly call store().
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
     * @var array
     */
    private $_options;
    /**
     * @var FS_Logger
     */
    private $_logger;
    /**
     * @var FS_Option_Manager[]
     */
    private static $_MANAGERS = array();
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string $id
     * @param bool   $load
     */
    private function __construct($id, $load = \false)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param $id
     * @param $load
     *
     * @return FS_Option_Manager
     */
    static function get_manager($id, $load = \false)
    {
    }
    private function _get_option_manager_name()
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
     *
     * @return bool
     */
    function has_option($option)
    {
    }
    /**
     * @author Vova Feldman (@svovaf)
     * @since  1.0.3
     *
     * @param string $option
     * @param mixed  $default
     *
     * @return mixed
     */
    function get_option($option, $default = \null)
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
     * @var string
     */
    protected $_slug;
    /**
     * @var FS_Plugin
     */
    protected $_plugin;
    /**
     * @var FS_Plugin_Manager[]
     */
    private static $_instances = array();
    /**
     * @var FS_Logger
     */
    protected $_logger;
    /**
     * @param string $slug
     *
     * @return FS_Plugin_Manager
     */
    static function instance($slug)
    {
    }
    protected function __construct($slug)
    {
    }
    protected function get_option_manager()
    {
    }
    protected function get_all_plugins()
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
     * @param bool|FS_Plugin $plugin
     * @param bool           $flush
     *
     * @return bool|\FS_Plugin
     */
    function store($plugin = \false, $flush = \true)
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
    protected $_sandbox;
    /**
     * @param string $pScope   'app', 'developer', 'user' or 'install'.
     * @param number $pID      Element's id.
     * @param string $pPublic  Public key.
     * @param string $pSecret  Element's secret key.
     * @param bool   $pSandbox Whether or not to run API in sandbox mode.
     */
    public function Init($pScope, $pID, $pPublic, $pSecret, $pSandbox = \false)
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
    /**
     * If successful connectivity to the API endpoint using ping.json endpoint.
     *
     *      - OR -
     *
     * Validate if ping result object is valid.
     *
     * @param mixed $pPong
     *
     * @return bool
     */
    public function Test($pPong = \null)
    {
    }
    /**
     * Ping API to test connectivity.
     *
     * @return object
     */
    public function Ping()
    {
    }
    /**
     * Find clock diff between current server to API server.
     *
     * @since 1.0.2
     * @return int Clock diff in seconds.
     */
    public function FindClockDiff()
    {
    }
    public function Api($pPath, $pMethod = 'GET', $pParams = array())
    {
    }
    /**
     * Base64 encoding that does not need to be urlencode()ed.
     * Exactly the same as base64_encode except it uses
     *   - instead of +
     *   _ instead of /
     *   No padded =
     *
     * @param string $input base64UrlEncoded string
     *
     * @return string
     */
    protected static function Base64UrlDecode($input)
    {
    }
    /**
     * Base64 encoding that does not need to be urlencode()ed.
     * Exactly the same as base64_encode except it uses
     *   - instead of +
     *   _ instead of /
     *
     * @param string $input string
     *
     * @return string base64Url encoded string
     */
    protected static function Base64UrlEncode($input)
    {
    }
}
class Freemius_Api extends \Freemius_Api_Base
{
    /**
     * Default options for curl.
     */
    public static $CURL_OPTS = array(\CURLOPT_CONNECTTIMEOUT => 10, \CURLOPT_RETURNTRANSFER => \true, \CURLOPT_TIMEOUT => 60, \CURLOPT_USERAGENT => \FS_SDK__USER_AGENT);
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
    public function GetUrl($pCanonizedPath = '')
    {
    }
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
     *      Date: Current date (i.e Sat, 14 Feb 2015 20:24:46 +0000)
     *      Authorization: FS {scope_entity_id}:{scope_entity_public_key}:base64encode(sha256(string_to_sign,
     *      {scope_entity_secret_key}))
     *
     * @param string $pResourceUrl
     * @param array  $opts
     */
    protected function SignRequest($pResourceUrl, &$opts)
    {
    }
    /**
     * Get API request URL signed via query string.
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
     * Makes an HTTP request. This method can be overridden by subclasses if
     * developers want to do fancier things or use something other than curl to
     * make the request.
     *
     * @param string        $pCanonizedPath The URL to make the request to
     * @param string        $pMethod        HTTP method
     * @param array         $params         The parameters to use for the POST body
     * @param null|resource $ch             Initialized curl handle
     *
     * @return object[]|object|null
     *
     * @throws Freemius_Exception
     */
    public function MakeRequest($pCanonizedPath, $pMethod = 'GET', $params = array(), $ch = \null)
    {
    }
    /**
     * @param string $pResult
     *
     * @throws Freemius_Exception
     */
    private function ThrowNoCurlException($pResult = '')
    {
    }
    /**
     * @param string $pResult
     *
     * @throws Freemius_Exception
     */
    private function ThrowCloudFlareDDoSException($pResult = '')
    {
    }
    /**
     * @param string $pResult
     *
     * @throws Freemius_Exception
     */
    private function ThrowSquidAclException($pResult = '')
    {
    }
}
class Test_Plugin_Addon
{
    function __construct()
    {
    }
    function admin_menu()
    {
    }
    function render_settings()
    {
    }
}
class Test_Plugin
{
    function __construct()
    {
    }
    function admin_menu()
    {
    }
    function render_settings()
    {
    }
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
/* Url.
	--------------------------------------------------------------------------------------------*/
function fs_get_url_daily_cache_killer()
{
}
/* Templates / Views.
	--------------------------------------------------------------------------------------------*/
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
function __fs($key)
{
}
function _efs($key)
{
}
/* Scripts and styles including.
	--------------------------------------------------------------------------------------------*/
function fs_enqueue_local_style($handle, $path, $deps = array(), $ver = \false, $media = 'all')
{
}
function fs_enqueue_local_script($handle, $path, $deps = array(), $ver = \false, $in_footer = 'all')
{
}
function fs_img_url($path)
{
}
/* Request handlers.
	--------------------------------------------------------------------------------------------*/
/**
 * @param string $key
 * @param mixed  $def
 *
 * @return mixed
 */
function fs_request_get($key, $def = \false)
{
}
function fs_request_has($key)
{
}
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
function fs_is_plugin_page($menu_slug)
{
}
/**
 * Get client IP.
 *
 * @author Vova Feldman (@svovaf)
 * @since  1.1.2
 *
 * @return string|null
 */
function fs_get_ip()
{
}
/* Core UI.
	--------------------------------------------------------------------------------------------*/
function fs_ui_action_button($slug, $page, $action, $title, $params = array(), $is_primary = \true)
{
}
function fs_ui_action_link($slug, $page, $action, $title, $params = array())
{
}
/* Core Redirect (copied from BuddyPress).
	--------------------------------------------------------------------------------------------*/
/**
 * Redirects to another page, with a workaround for the IIS Set-Cookie bug.
 *
 * @link  http://support.microsoft.com/kb/q176113/
 * @since 1.5.1
 * @uses  apply_filters() Calls 'wp_redirect' hook on $location and $status.
 *
 * @param string $location The path to redirect to
 * @param int    $status   Status code to use
 *
 * @return bool False if $location is not set
 */
function fs_redirect($location, $status = 302)
{
}
/**
 * Sanitizes a URL for use in a redirect.
 *
 * @since 2.3
 *
 * @param string $location
 *
 * @return string redirect-sanitized URL
 */
function fs_sanitize_redirect($location)
{
}
/**
 * Removes any NULL characters in $string.
 *
 * @since 1.0.0
 *
 * @param string $string
 *
 * @return string
 */
function fs_kses_no_null($string)
{
}
/**
 * Normalize a filesystem path.
 *
 * Replaces backslashes with forward slashes for Windows systems, and ensures
 * no duplicate slashes exist.
 *
 * @param string $path Path to normalize.
 *
 * @return string Normalized path.
 */
function fs_normalize_path($path)
{
}
function fs_nonce_url($actionurl, $action = -1, $name = '_wpnonce')
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
#region Url Canonization ------------------------------------------------------------------
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
#endregion Url Canonization ------------------------------------------------------------------
function fs_download_image($from, $to)
{
}
/**
 * Display plugin information in dialog box form.
 *
 * @since 2.7.0
 */
function fs_install_plugin_information()
{
}
/**
 * Quick shortcut to get Freemius for specified plugin.
 * Used by various templates.
 *
 * @param string $slug
 *
 * @return Freemius
 */
function freemius($slug)
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
 */
function fs_init($slug, $plugin_id, $public_key, $is_live = \true, $is_premium = \true)
{
}
/**
 * @param array [string]string $plugin
 *
 * @return Freemius
 * @throws Freemius_Exception
 */
function fs_dynamic_init($plugin)
{
}
function fs_dump_log()
{
}
function test_plugin_addon()
{
}
function is_parent_plugin_activated()
{
}