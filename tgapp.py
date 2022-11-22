from tg import expose, TGController

class RootController(TGController):

    @expose()
    def index(self):
        return 'Hello Word, by PABW 7B2 Punokawan'

    @expose('hello.xhtml')
    def hello(self, person=None):
        return dict(person=person)
    
    @expose('json.xhtml')
    def json(self, person=None):
        return dict(person=person)

    @expose('xml.xhtml')
    def xml(self, person=None):
        return dict(person=person)

    @expose('csv.xhtml')
    def csv(self, person=None):
        return dict(person=person)

from tg import MinimalApplicationConfigurator

config = MinimalApplicationConfigurator()
config.update_blueprint({
    'root_controller': RootController(),
    'renderers': ['kajiki']
})

application = config.make_wsgi_app()

from wsgiref.simple_server import make_server

print("Serving on port 8080...")
httpd = make_server('', 8080, application)
httpd.serve_forever()