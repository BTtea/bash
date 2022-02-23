import discord
from discord.ext import commands


client=discord.Client()

bot=commands.Bot(command_prefix=";")

channel_ID=1234567890

@bot.command()
async def cls(ctx,*,msg):
    await ctx.channel.purge(limit=int(msg)+1)


@bot.event
async def on_message(msg):

    if msg.author != bot.user:
        if msg.content == '030':
            await msg.channel.send('030')
    
    await bot.process_commands(msg)


@bot.event
async def on_ready():
    print("===== Bot On Ready. =====")


@bot.event
async def on_member_join(member):
    channel = bot.get_channel(channel_ID)
    await channel.send(f'{member} join!')


@bot.event
async def on_member_remove(member):
    channel = bot.get_channel(channel_ID)
    await channel.send(f'{member} remove!')


bot.run('token')
