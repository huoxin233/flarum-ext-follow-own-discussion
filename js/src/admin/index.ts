import app from 'flarum/admin/app';

app.initializers.add('huoxin/follow-own-discussion', () => {
  app.extensionData.for('huoxin-follow-own-discussion')
        .registerSetting({
            setting: 'huoxin-follow-own-discussion.defaultFollowAfterCreate',
            type: 'boolean',
            label: app.translator.trans('huoxin-follow-own-discussion.admin.default-follow-after-create-label'),
            help: app.translator.trans('huoxin-follow-own-discussion.admin.default-follow-after-create-help'),
        });
});
