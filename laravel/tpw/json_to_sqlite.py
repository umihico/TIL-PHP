
import sqlite3
from ppickle import load
from contextlib import closing
json=load('merged.json')
dbname = 'database/database.sqlite'

with closing(sqlite3.connect(dbname)) as conn:
    c = conn.cursor()
    insert_sql = 'insert into portfolios (geotags, full_name, forks, gif_path, gif_success, homepage, homepage_exist, html_url, pushed_at, reponame, skills, stargazers_count, username) values (?,?,?,?,?,?,?,?,?,?,?,?,?)'
    portfolio_list = [
        (2, 'Shota', 54, 'male'),
        (3, 'Nana', 40, 'female'),
        (4, 'Tooru', 78, 'male'),
        (5, 'Saki', 31, 'female')
    ] # example
    names=["geotags", "full_name", "forks", "gif_path", "gif_success", "homepage", "homepage_exist", "html_url", "pushed_at", "reponame", "skills", "stargazers_count", "username"]
    portfolio_list=[]
    for dic in json:
        skillset=dic['skills']
        dic['skills']=[(lang,str(pie)) for lang,pie in skillset]
        tuple_=[str(x).replace("'",'"') if isinstance(x,(list,dict,type(None))) else x for x in [dic[name] for name in names]]
        portfolio_list.append(tuple_)
    c.executemany(insert_sql, portfolio_list)
    conn.commit()
