<?php if (!defined('APPLICATION')) exit(); ?>
<div class="Help Aside">
    <?php
    echo '<h2>', T('Need More Help?'), '</h2>';
    echo '<ul>';
    echo '<li>', Anchor(T('jsConnect Documentation'), 'http://docs.vanillaforums.com/features/sso/jsconnect/'), '</li>';
    echo '<li>', Anchor(T('jsConnect Client Libraries'), 'http://docs.vanillaforums.com/features/sso/jsconnect/overview/#your-endpoint'), '</li>';
    echo '</ul>';
    ?>
</div>
<h1><?php echo sprintf(t('%s Settings'), 'jsConnect'); ?></h1>
<div class="Info">
    <?php echo T('You can connect to multiple sites that support jsConnect.'); ?>
</div>
<div class="FilterMenu"><?php
    echo Anchor(T('Add Connection'), '/settings/jsconnect/addedit', 'SmallButton');
?></div>
<div class="Info">
    <h2>Signing In</h2>
    <?php
        echo $this->Form->open();
        echo $this->Form->errors();

        echo wrap($this->Form->checkBox(
            'Garden.Registration.AutoConnect',
            'Automatically connect to an existing user account if it has the same email address.'
        ), 'p');
        echo wrap($this->Form->checkBox(
            'Garden.SignIn.Popup',
            'Use popups for sign in pages <small>(not recommended while using SSO)</small>.'
        ), 'p');

        echo '<div class="Buttons">';
        echo $this->Form->button('Save');
        echo '</div>';

        echo $this->Form->close();
    ?>
</div>
<table class="AltRows">
    <thead>
    <tr>
        <th><?php echo T('Client ID'); ?></th>
        <th><?php echo T('Site Name'); ?></th>
        <th><?php echo T('Authentication URL'); ?></th>
        <th><?php echo T('Test') ?></th>
        <th>&#160;</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach ($this->Data('Providers') as $Provider): ?>
        <tr>
            <td><?php echo htmlspecialchars($Provider['AuthenticationKey']); ?></td>
            <td><?php echo htmlspecialchars($Provider['Name']); ?></td>
            <td><?php echo htmlspecialchars($Provider['AuthenticateUrl']); ?></td>
            <td>
                <?php
                echo Anchor(T('Test URL'), str_replace('=?', '=test', JsConnectPlugin::connectUrl($Provider, TRUE)));
                ?>
                <div class="JsConnectContainer UserInfo"></div>
            </td>
            <td>
                <?php
                echo Anchor(T('Edit'), '/settings/jsconnect/addedit?client_id='.urlencode($Provider['AuthenticationKey']), 'SmallButton');
                echo Anchor(T('Delete'), '/settings/jsconnect/delete?client_id='.urlencode($Provider['AuthenticationKey']), 'Popup SmallButton');
                ?>
            </td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>