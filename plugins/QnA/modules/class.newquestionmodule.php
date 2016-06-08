<?php if (!defined('APPLICATION')) { exit(); }

/**
 * Garden.Modules
 */

/**
 * Renders the "Ask a Question" button.
 */
class NewQuestionModule extends Gdn_Module {

    public function assetTarget() {
        return 'Panel';
    }

    public function toString() {
        $HasPermission = Gdn::session()->checkPermission('Vanilla.Discussions.Add', true, 'Category', 'any');
        if ($HasPermission) {
            echo anchor(t('Ask a Question'), '/post/question', 'Button BigButton NewQuestion');
        }
    }
}
