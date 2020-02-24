# Fetching random lines from Shakespear

This is scoped to a single work ([Othello](https://github.com/severdia/PlayShakespeare.com-XML/blob/master/playshakespeare_editions/ps_othello.xml)). Given a number of lines to fetch and a member of the case, this will return an array of the given size with random lines for the given case member.

This is relatively generic given the expected data structure, so it could be made generic by parameterizing the file name, assuming the files were all available.

## Usage

Assuming you have PHP installed, you can call the example usage script like this:

## To Do

- [ ] don't allow for duplicate lines returned
- [ ] sanity cap for number of lines requested

```
bash$ php useRandomOthello.php 5 Clown
```

... where `5` is how many lines you want returned, and `Clown` is the character who's lines you'd like to see. These are the available characters in the transcript:

```
Othello
Iago
Cassio
Brabantio
Roderigo
Lodovico
Duke of Venice
Montano
Gratiano
Desdemona
Emilia
Bianca
Clown
First Musician
Officer
Sailor
First Senator
Second Senator
First Gentleman
Second Gentleman
Third Gentleman
First Messenger
Second Messenger
Herald
```
