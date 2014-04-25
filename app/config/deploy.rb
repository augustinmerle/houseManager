set :stages,        %w(production staging)
set :default_stage, "staging"
set :stage_dir,     "app/config"
require 'capistrano/ext/multistage'

set :application, "brehat"
set :deploy_to,   "/var/sf2Projects/brehat"
set :app_path,    "app"
set :web_path, "web"

set :repository,  "git@github.com:augustinmerle/houseManager.git"
set :scm,         :git
# Or: `accurev`, `bzr`, `cvs`, `darcs`, `subversion`, `mercurial`, `perforce`, or `none`

set :model_manager, "doctrine"
# Or: `propel`

set  :keep_releases,  3

# Be more verbose by uncommenting the following line
# logger.level = Logger::MAX_LEVEL

set :use_composer, true
#set :update_vendors, true
set :user, "augustin"
set :use_sudo, false
ssh_options[:forward_agent] = true
set :deploy_via, :remote_cache
#set :use_orm, true
set :shared_files,      [ "app/config/parameters.yml"]
set :shared_children,     [app_path + "/logs",app_path + "/cache", web_path + "/uploads", "vendor" ,app_path + "/sessions"]

set :writable_dirs,       ["app/cache", "app/logs"]
set :webserver_user,      "www-data"
set :permission_method,   :acl
set :use_set_permissions, true
