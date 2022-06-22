<style>


.add_sub_block{
    position: absolute;
    background-color: rgba(194, 194, 194, .3);
    top: 50px;
    left: 0;
    right: 0;
    bottom: 0;
    display: none;
    justify-content: center;
    align-items: center;
}

.add_sub {
    width: 85%;
    overflow: hidden;
    border-radius: 5px;
    background-color: var(--primary);
}

.add_head {
    margin: 0;
    background-color: var(--tertiary);
    font-size: 0.65em;
    padding: 0 15px;
    border-bottom: 2px solid var(--secondary);
    display: flex;
    align-items: center;
    justify-content: space-between;
}

.add_head>h2 {
    color: var(--primary);
    font-size: 1.1em;
}
.add_head>h2 > i {
    font-size: 1.2em;
    margin-right: 5px;
}
.add_head>i {
    color: var(--primary);
    font-size: 1.65em;
    margin-right: 5px;
}

.add_head>i:hover {
    color: red;
}

.hidAdd {
    display: flex;
}

.form_add {
    display: grid;
    grid-template-columns: repeat(12, 1fr);
    padding: 20px;
    column-gap: 30px;
    row-gap: 10px;
}

.gr1 {
    grid-column: 1/13;
}

.gr2-1 {
    grid-column: 1/5;
}

.gr2-2 {
    grid-column: 5/9;
}

.gr2-3 {
    grid-column: 9/13;
}

.gr3-1 {
    grid-column: 1/7;
}

.gr3-2 {
    grid-column: 7/13;
}
.gr4-1{
    grid-column: 1/3;}
.gr4-2{
    grid-column: 3/5;}
.gr4-3{
    grid-column: 5/7;}
.gr4-4{
    grid-column: 7/9;}
.gr4-5{
    grid-column: 9/11;}
.gr4-6{
    grid-column: 11/13;}
.gr5-1{
    grid-column: 1/4;}
.gr5-2{
    grid-column: 4/7;}
.gr5-3{
    grid-column: 7/10;}
.gr5-4{
    grid-column: 10/13;}


.header1 {
    font-weight: 600;
    font-size: .8em;
}

.form_add>form-control {
    display: flex;
    align-items: center;
}

.form_add>form-control>label > pre {
    font-size: 0.7em;
}

.form_add>form-control>input,
.form_add>form-control>select {
    width: 100%;
    background-color: var(--fontDark);
    filter: brightness(1.25);
    font-size: 0.65em;
    border-radius: 5px;
    border: none;
    text-transform: uppercase;
    padding: 9px;
    border: 1px solid var(--fontDark2);
  box-shadow: 1px 1px 5px var(--fontDark2);
    outline: none;
}
.form_add>form-control>input:not(:placeholder-shown){
  border-color: var(--secondary);
  box-shadow: 1px 1px 5px var(--secondary);
}
.form_add>form-control>select:valid {
  box-shadow: 1px 1px 5px var(--secondary);
  border-color: var(--secondary);
}
.form_add>form-control>select>option {
    font-size: 1.1em;
    color: var(--primary);
    background-color: var(--fontDark);
}

.form_add>form-control>input:hover,
.form_add>form-control>input:focus,
.form_add>form-control>select:hover,
.form_add>form-control>select:focus {
  box-shadow: 1px 1px 5px var(--secondary);
    border: 1px solid var(--secondary);
}

.opt_brgy {
    display: none !important;
}

.bal,
.pil,
.ori {
    display: flex;
}
.form-c-btn{
display: flex;
align-items: center;
justify-content: end;
}
.addFormBtn{
    display:flex;
    align-items: center;
    font-size:.8em;
    border-radius: 4px;
    font-weight: 600;
    margin-top: 25px;
    padding: 7px;
}
.addFormBtn > i{
    font-size:1em;
    margin-right:5px;
}
</style>