<h2><?php print text('userlist:title'); ?></h2>
<?php print sml()->printMessage(); ?>
<table cellspacing="0">
	<caption>User Accounts | <?php print Link::path(text('userlist:adduser'), 'add'); ?></caption>
	<thead>
		<tr>
			<th><?php print text('userlist:th:name'); ?></th>
			<th><?php print text('userlist:th:email'); ?></th>
			<th><?php print text('userlist:th:latestlogin'); ?></th>
			<th><?php print text('userlist:th:groups'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php if($users): foreach($users as $user): ?>
		<tr>
			<td><?php print Link::path($user['first_name'].' '.$user['last_name'], 'edit', array('id' => $user['id'])) ?></td>
			<td><?php print $user['email'] ?></td>
			<td><?php print Date::niceDate($user['latest_login']) ?></td>
			<td><?php print Utils::implode(', ', Utils::extract('Groups.{n}.name', $user)) ?></td>
		</tr>
		<?php endforeach; else: ?>
		<tr><td><?php print text('userlist:noresults'); ?></td></tr>
		<?php endif; ?>
	</tbody>
</table>