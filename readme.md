## jt-roots-starter

### Installation
1. Create a new project directory: `$ mkdir example.com && cd example.com`
2. Clone jt-roots-starter: `$ git clone git@github.com:jerome-toole/jt-roots-starter.git . && rm -rf .git`
3. Install the Ansible Galaxy roles: `$ cd trellis && ansible-galaxy install -r requirements.yml`

4. Run `$ cd site && composer install`
5. Copy `.env.example` to `.env` and update environment variables:
  * `DB_NAME` - Database name
  * `DB_USER` - Database user
  * `DB_PASSWORD` - Database password
  * `DB_HOST` - Database host
  * `WP_ENV` - Set to environment (`development`, `staging`, `production`)
  * `WP_HOME` - Full URL to WordPress home (http://example.com)
  * `WP_SITEURL` - Full URL to WordPress including subdirectory (http://example.com/wp)
  * `AUTH_KEY`, `SECURE_AUTH_KEY`, `LOGGED_IN_KEY`, `NONCE_KEY`, `AUTH_SALT`, `SECURE_AUTH_SALT`, `LOGGED_IN_SALT`, `NONCE_SALT` - Generate with [wp-cli-dotenv-command](https://github.com/aaemnnosttv/wp-cli-dotenv-command) or from the [Roots WordPress Salt Generator](https://roots.io/salts.html)
6. Access WP admin at `http://example.com/wp/wp-admin`

## Local development setup

1. Configure your WordPress sites in `group_vars/development/wordpress_sites.yml` and in `group_vars/development/vault.yml`
2. Run `vagrant up`