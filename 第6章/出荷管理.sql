select p.id,customer_id,c.name,shipping
from purchase as p
left join customer as c on c.id = p.customer_id;

-- SELECT 以下にはグループ化して1行になるものしか書けないので注意しましょう
select p.id,c.name,c.email,
GROUP_CONCAT(s.name) as pname ,
GROUP_CONCAT(d.count) as num ,shipping, p.created
from purchase as p
left join customer as c on c.id = p.customer_id
left join purchase_detail as d on purchase_id = p.id
left join product as s on s.id = product_id
group by p.id
limit 0,15


