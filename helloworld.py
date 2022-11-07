from distutils.command.config import config
from email.mime import application
from tg import expose, TGController, AppConfig
from wsgiref.simple_server import make_server

class HelloWorld(TGController):
    @expose ()
    def index(self):
        return "Hello Word, by PABW 7B2 punokawan"

if __name__ == '__main__':
    config = AppConfig(minimal = True, root_controller = HelloWorld())
    application = config.make_wsgi_app()
    httpd = make_server('',8080, application)
    httpd.serve_forever()
