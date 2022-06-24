<style type="text/css">
.section_logIn {
    border: 2px solid var(--shadow);
    width: fit-content;
    height: fit-content;
    border-radius: 4px;
    padding: 10px;
    zoom: .95;
    margin: auto;
    box-shadow: 10px 10px 8px var(--shadow);

}

.form_logIn {
    padding: 15px;
    display: flex;
    font-size: 20px;
    flex-direction: column;
}

.form_logIn>input {
    font-size: .75em;
    padding: 0 0 0 5px;
    height: 30px;
    outline: none;
    border: 2px solid var(--fontDark);
    border-radius: 4px;
    color: var(--tertiary);
    font-weight: 600;
    width: 350px;
    margin-bottom: 10px;
    transition: .3s ease-in-out;
}

.form_logIn>input:hover,
.form_logIn>input:focus {
    border: 2px solid var(--secondary);
    transition: .3s ease-in-out;
}

.form_logIn>button {
    background-color: var(--tertiary);
    border-radius: 4px;
    height: 35px;
    border: none;
    outline: none;
    margin-top: 25px;
    color: var(--fontDark);
    font-weight: 600;
    border: 1px solid var(primary);
    transition: 0.5s ease-in;
}

.form_logIn>button:hover {
    color: var(--primary);
    background-color: var(--secondary);
    transition: 0.5s ease-in;
}

.headr_log {
    margin: 0;
    padding: 0;
    display: flex;
    flex-direction: column;
    align-items: center;
    border-bottom: 5px solid var(--secondary);
    border-radius: 5px;
}

.headr_log>img {
    width: 20%;

}

.headr_log>h2 {
    margin: 0;
    font-size: 2em;
    padding: 0 15px 5px 15px;
}

.error_log {
    margin: 5px 0 -10px 0;
    height: 22px;
    padding: 0;
    color: red;
    filter: saturate(.8);
    text-align: center;
}
</style>